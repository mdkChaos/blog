<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    /**
     * Store a new post.
     *
     * @param mixed $data
     * @return void
     */
    public function store(mixed $data): void
    {
        try {
            DB::beginTransaction();

            $tagIds = $this->extractTagIds($data);
            $data = $this->handleImages($data);

            $post = Post::firstOrCreate($data);

            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }

            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Update an existing post.
     *
     * @param mixed $data
     * @param Post $post
     * @return Post
     */
    public function update(mixed $data, Post $post): Post
    {
        try {
            Db::beginTransaction();

            $tagIds = $this->extractTagIds($data);
            $data = $this->handleImages($data);

            $post->update($data);

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500, $exception->getMessage());
        }

        return $post;
    }

    /**
     * Extract tag IDs from the data array.
     *
     * @param mixed $data
     * @return mixed|null
     */
    private function extractTagIds(mixed &$data): mixed
    {
        if (isset($data['tag_ids'])) {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            return $tagIds;
        }
        return null;
    }

    /**
     * Handle image uploads and update the data array with stored image paths.
     *
     * @param mixed $data
     * @return mixed
     */
    private function handleImages(mixed $data): mixed
    {
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        }

        return $data;
    }
}

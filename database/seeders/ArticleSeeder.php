<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Memulai Belajar Laravel',
                'content' => 'Laravel adalah framework PHP yang sangat populer. Framework ini menyediakan berbagai fitur yang memudahkan developer dalam membangun aplikasi web modern. Dengan dokumentasi yang lengkap dan komunitas yang besar, Laravel menjadi pilihan utama untuk web development.',
                'category_id' => 2,
            ],
            [
                'title' => 'Tips Produktif untuk Developer',
                'content' => 'Menjadi developer yang produktif memerlukan kebiasaan yang baik. Gunakan keyboard shortcuts, pelajari Git dengan baik, dan jangan lupa istirahat. Produktivitas bukan tentang bekerja keras, tapi bekerja dengan cerdas dan efisien.',
                'category_id' => 3,
            ],
            [
                'title' => 'Perkembangan AI Terkini',
                'content' => 'Artificial Intelligence terus berkembang pesat. Teknologi AI kini sudah digunakan di berbagai bidang, mulai dari healthcare, pendidikan, hingga industri kreatif. Machine learning dan deep learning menjadi topik yang semakin populer di kalangan developer.',
                'category_id' => 1,
            ],
        ];

        foreach ($articles as $article) {
            Article::create([
                'title' => $article['title'],
                'slug' => Str::slug($article['title']),
                'content' => $article['content'],
                'excerpt' => Str::limit($article['content'], 150),
                'category_id' => $article['category_id'],
                'user_id' => 1,
                'published_at' => now(),
            ]);
        }
    }
}
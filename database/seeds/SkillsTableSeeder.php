<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	$data = array([
		'name' => 'JavaScript',
		'description' => 'Langage de script JavaScript',
		'logo' => 'js.png',
	],
	[
		'name' => 'HTML5 - CSS3',
                'description' => 'Langage HTML et CSS3 pour le développement Web',
                'logo' => 'html-css.png',
	],
        [
                'name' => 'PHP',
                'description' => 'Langage de script PHP, utilisé côté serveur pour les applications Web',
                'logo' => 'php.png',
        ],
        [
                'name' => 'Python',
                'description' => 'Langage de script Python',
                'logo' => 'python.png',
        ],);
    App\Skill::insert($data);
    }
}


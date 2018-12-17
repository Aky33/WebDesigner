<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();
        
        DB::table('posts')->insert([
            'title' => 'Test1',
            'content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Suspendisse nisl. Fusce nibh. Integer tempor. Integer pellentesque quam vel velit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce nibh. Mauris metus. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Fusce tellus. In convallis. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Ut tempus purus at lorem. Integer imperdiet lectus quis justo. Aenean placerat. Mauris dictum facilisis augue.',
        ]);
        
        DB::table('posts')->insert([
            'title' => 'Test2',
            'content' => 'Praesent dapibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Integer malesuada. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris elementum mauris vitae tortor. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Fusce aliquam vestibulum ipsum. Phasellus faucibus molestie nisl. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nulla quis diam. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Etiam neque. Nam sed tellus id magna elementum tincidunt. Maecenas libero. Fusce tellus. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Aenean id metus id velit ullamcorper pulvinar. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Praesent in mauris eu tortor porttitor accumsan.',
        ]);
    }
}

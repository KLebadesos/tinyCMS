<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Post;
use Faker\Generator as Faker;



function duplicate_img(){
    $randnumber = rand(1,100);
    $file = 'storage/app/public/posts/sample.jpg';
    $newfile = 'storage/app/public/posts/mykeyboard_' . $randnumber . '.jpg';
    if (!copy($file, $newfile)) {
        printf("failed to copy sample image \n");
    }else{
        $path_parts = pathinfo($newfile);
        $image_path = 'posts/' .$path_parts['basename'];
        printf( 'Success ^_^ ! new image added: ' . $image_path . "\n");
        return $image_path;
    };
}
 
$factory->define(Post::class, function (Faker $faker) {
    return [
       'title'         => $faker->sentence(4),
       'description'   => $faker->paragraph(4),
       'content'       => '<h1><strong>Lorem ipsum dolor sit amet,&nbsp;</strong></h1><div><em>consectetur </em>&nbsp;<strong>I</strong> <em>&nbsp;adipiscing elit. Mauris sit amet tortor ultricies, s</em>uscipit neque non, scelerisque metus. Mauris ornare velit eu justo<strong> am </strong><em>accumsan. Aliquam vel</em> <strong>Kevin </strong>&nbsp;<em>dolor, ut fermentum</em> <strong>a</strong> <em>Morbi est ex, feugiat </em>dapibus massa sit amet, porttitor blandit ipsum. Sed pulvinar volutpat libero. Curabitur et mattis dolor. <strong>Full</strong> <em>vel velit fringilla,</em> <strong>web</strong> o<em>rci eu, viverra dui.</em> <strong>developer.</strong> sapien quis magna condimentum vestibulum in eget leo. Aliquam a ullamcorper nisl. Integer a eros dolor. Sed dapibus, massa ac viverra dapibus, nunc sem faucibus ante, eget gravida purus urna laoreet nibh. Integer fringilla libero non congue laoreet.<br><br></div><h1><del>Donec auctor commodo tellus,</del></h1><div><em>sed luctus ex placerat ut. Sed a faucibus ligula. Nulla vehicula purus ligula, id efficitur ligula sodales et. </em>Integer aliquam suscipit diam. Aenean congue sagittis ex ut commodo. Cras sed elit auctor, commodo augue quis, molestie nunc. Ut dapibus sed nisi ac ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis orci dolor, dapibus nec semper ut, <em>euismod ac mi. Quisque condimentum, dui in ultrices interdum, arcu mi maximus turpis, et iaculis diam tortor non enim. Aenean ex mauris, ornare non ligula at, ornare volutpat justo. In vitae ultrices enim, quis scelerisque sem. Integer ullamcorper faucibus mi ut blandit.</em></div><div><br></div><h1>Duis urna orci,</h1><div>rutrum vitae placerat ac, pharetra non ipsum. Vivamus fe<strong>rmentum hendrerit </strong>quam, elementum tempor massa tempus tempus. Pellentesque non ipsum sed elit congue pellentesque. In sit amet diam ornare, facilisis metus ut, bibendum urna. Suspendisse non magna nisl. Proin congue rutrum elementum. Curabitur augue lectus, porttitor in <strong>pharetra sed,</strong> porttitor eu ante. Pellentesque lectus lorem, tempus in <strong>blandit et, vehicula eu odio.</strong> Curabitur egestas efficitur arcu condimentum imperdiet. Vivamus justo lorem, viverra et ornare id, lacinia et turpis. Praesent <strong>fermentum vulputate metus</strong> in dictum. Vestibulum condimentum libero a magna blandit, vel scelerisque est consequat. Nullam ac enim ut libero posuere venenatis. Donec sit amet feugiat augue, id pharetra arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse ex tellus, varius a posuere quis, dignissim quis felis.</div><div><br></div>',
       'published_at'  => '2020-03-10 12:00:00',
       'image'         => duplicate_img(),
    ];
});

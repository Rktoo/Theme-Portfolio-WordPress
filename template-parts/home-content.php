<!-- home-content.php -->

<div class="w-full grid grid-cols-1 space-y-10 space-x-5 md:grid-cols-3 justify-between items-center">
    <div class="col-span-2 flex flex-col justify-start items-start -mt-4 md:-mt-28">
        <h2 class="text-5xl font-bold text-gray-800">Bonjour, je suis <span class="text-teal-500"><?php echo esc_html(get_theme_mod('user_name')); ?></span></h2>
        <p class="text-xl mt-4 text-gray-700">Développeur Web Full-Stack passionné par la création d'expériences numériques modernes et élégantes.</p>
        <div class="mt-10 w-full flex justify-center md:justify-start items-center">
            <a href="#skills" class="bg-teal-400 text-white px-6 py-3 rounded-lg shadow-md hover:bg-red-500">Voir mes compétences</a>
            <a href="#projects" class="ml-4 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-900">Mes projets</a>
        </div>
    </div>
    <div class="hero col-span-1 w-full flex justify-center items-start ">
        <div class=" w-64 h-64 md:w-80 md:h-80 rounded-full bg-[#f4f4f4] shadow-lg overflow-hidden -mt-4 md:-mt-20">
            <img src="<?php echo get_theme_mod('hero_image'); ?>" alt="Image de bannière" class="w-64 h-64 md:w-80 md:h-80">
        </div>
    </div>
</div>
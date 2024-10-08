<!-- home-content -->

<div class="w-full grid grid-cols-1 space-y-10 mr-4 pr-4 space-x-5 md:grid-cols-3 justify-between items-center">
    <div class="col-span-2 flex flex-col justify-start items-start -mt-4 md:-mt-28 mb-4">
        <h2 class="text-5xl font-bold text-gray-800">Bonjour, je suis <span class="text-teal-500"><?php echo esc_html(get_theme_mod('user_name')); ?></span></h2>
        <p class="text-xl mt-4 text-gray-700"><?php echo esc_html(get_theme_mod('user_description')); ?></p>
        <div class="mt-10 w-full flex justify-center md:justify-start items-center">
            <a href="#skills" class="bg-teal-400 text-white px-6 py-3 rounded-lg shadow-md hover:bg-red-500">Voir mes compétences</a>
            <a href="#projects" class="ml-4 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-900">Mes projets</a>
        </div>
        <div class="mt-4 w-full flex justify-center md:justify-start items-center">
            <a href="#activities" class="bg-teal-400 text-white px-6 py-3 rounded-lg shadow-md hover:bg-red-500">Voir mes activités</a>
        </div>
    </div>
    <div class="hero col-span-1 w-full h-full flex justify-center items-center lg:items-start  transform -translate-x-4 -translate-y-2">
        <div class="w-56 h-56 md:w-64 md:h-64 lg:w-80 lg:h-80 rounded-full bg-[#f4f4f4] shadow-lg overflow-hidden -mt-4  md:-mt-28">
            <img src="<?php echo get_theme_mod('hero_image'); ?>" alt="Image de bannière" class="w-56 h-56 md:w-64 md:h-64 lg:w-80 lg:h-80">
        </div>
    </div>
</div>
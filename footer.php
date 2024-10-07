</main>
<footer class="bg-gradient-to-r from-blue-500 to-teal-500 text-white">
    <div class="max-w-6xl mx-auto p-10">
        <p>&copy; <?php echo date("Y"); ?> Mon Portfolio</p>
    </div>
    <div class="fixed bottom-10 right-[10%] opacity-0 " id="scroll-btn">
        <a href="#content" class="relative group w-8 h-8 opacity-75 hover:opacity-100 transition-opacity duration-150 ease-in-out z-30 overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon" class=" w-8 h-8 text-[#f4f4f4] group-hover:text-white group-hover:scale-110 transition-all duration-200 ease-in-out z-20">
                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1Zm-.75 10.25a.75.75 0 0 0 1.5 0V6.56l1.22 1.22a.75.75 0 1 0 1.06-1.06l-2.5-2.5a.75.75 0 0 0-1.06 0l-2.5 2.5a.75.75 0 0 0 1.06 1.06l1.22-1.22v4.69Z" clip-rule="evenodd" />

            </svg>
            <div class="absolute -top-2 -left-2 bg-gray-800 w-12 h-12 rounded-full -z-10"></div>
        </a>
    </div>
</footer>
<!-- Inclusion des styles et script dans le footer -->
<?php wp_footer(); ?>
</body>

</html>
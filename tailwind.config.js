/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',                // Fichiers PHP à la racine
    './template-parts/*.php', // Dossier pour les fichiers de template
    './templates/*.php',     // Ajoute cette ligne pour les fichiers dans le dossier templates
    './template-parts/**/*.php',     // Ajoute cette ligne pour les fichiers dans le dossier templates
    './assets/**/*.js',       // Dossier pour le JavaScript 
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};


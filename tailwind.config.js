/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontSize:{
                'banner':'3.5rem/* 56px */'
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

const primaryColors = require("@left4code/tw-starter/dist/js/colors");
module.exports = {
  purge: [
      './storage/framework/views/*.php',
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
      "./node_modules/@left4code/tw-starter/**/*.js",
  ],
  darkMode: "class", // or 'media' or 'class'
    theme: {
        borderColor: (theme) => ({
            ...theme("colors"),
            DEFAULT: primaryColors.gray["300"],
        }),
        colors: {
            ...primaryColors,
            white: "white",
            black: "black",
            current: "current",
            transparent: "transparent",
            theme: {
                1: "#8ec63f",
                2: "#F1F5F8",
                3: "#8ec63f",
                4: "#8ec63f",
                5: "#DEE7EF",
                6: "#D32929",
                7: "#365A74",
                8: "#D2DFEA",
                9: "#91C714",
                10: "#8ec63f",
                11: "#F78B00",
                12: "#FBC500",
                13: "#7F9EB9",
                14: "#E6F3FF",
                15: "#8DA9BE",
                16: "#607F96",
                17: "#FFEFD9",
                18: "#D8F8BC",
                19: "#8ec63f",
                20: "#8ec63f",
                21: "#C6D4FD",
                22: "#E8EEFF",
                23: "#8ec63f",
                24: "#8ec63f",
                25: "#C7D2FF",
                26: "#8ec63f",
                27: "#8ec63f",
                28: "#BBC8FD",
                29: "#8ec63f",
                30: "#98AFF5",
            },
        },
        extend: {
            fontFamily: {
                roboto: ["Roboto"],
            },
            container: {
                center: true,
            },
            maxWidth: {
                "1/4": "25%",
                "1/2": "50%",
                "3/4": "75%",
            },
            strokeWidth: {
                0.5: 0.5,
                1.5: 1.5,
                2.5: 2.5,
            },
        },
    },
    variants: {
        extend: {
            boxShadow: ["dark"],
        },
    },
  plugins: [],
}

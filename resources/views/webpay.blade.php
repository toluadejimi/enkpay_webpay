<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>ENKPAY | Webpay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="max-image-preview:large">




    <style id="wp-block-library-inline-css">
        :root {
            --wp-admin-theme-color: #007cba;
            --wp-admin-theme-color--rgb: 0, 124, 186;
            --wp-admin-theme-color-darker-10: #006ba1;
            --wp-admin-theme-color-darker-10--rgb: 0, 107, 161;
            --wp-admin-theme-color-darker-20: #005a87;
            --wp-admin-theme-color-darker-20--rgb: 0, 90, 135;
            --wp-admin-border-width-focus: 2px;
            --wp-block-synced-color: #7a00df;
            --wp-block-synced-color--rgb: 122, 0, 223
        }

        @media (-webkit-min-device-pixel-ratio:2),
        (min-resolution:192dpi) {
            :root {
                --wp-admin-border-width-focus: 1.5px
            }
        }

        .wp-element-button {
            cursor: pointer
        }

        :root {
            --wp--preset--font-size--normal: 16px;
            --wp--preset--font-size--huge: 42px
        }

        :root .has-very-light-gray-background-color {
            background-color: #eee
        }

        :root .has-very-dark-gray-background-color {
            background-color: #313131
        }

        :root .has-very-light-gray-color {
            color: #eee
        }

        :root .has-very-dark-gray-color {
            color: #313131
        }

        :root .has-vivid-green-cyan-to-vivid-cyan-blue-gradient-background {
            background: linear-gradient(135deg, #00d084, #0693e3)
        }

        :root .has-purple-crush-gradient-background {
            background: linear-gradient(135deg, #34e2e4, #4721fb 50%, #ab1dfe)
        }

        :root .has-hazy-dawn-gradient-background {
            background: linear-gradient(135deg, #faaca8, #dad0ec)
        }

        :root .has-subdued-olive-gradient-background {
            background: linear-gradient(135deg, #fafae1, #67a671)
        }

        :root .has-atomic-cream-gradient-background {
            background: linear-gradient(135deg, #fdd79a, #004a59)
        }

        :root .has-nightshade-gradient-background {
            background: linear-gradient(135deg, #330968, #31cdcf)
        }

        :root .has-midnight-gradient-background {
            background: linear-gradient(135deg, #020381, #2874fc)
        }

        .has-regular-font-size {
            font-size: 1em
        }

        .has-larger-font-size {
            font-size: 2.625em
        }

        .has-normal-font-size {
            font-size: var(--wp--preset--font-size--normal)
        }

        .has-huge-font-size {
            font-size: var(--wp--preset--font-size--huge)
        }

        .has-text-align-center {
            text-align: center
        }

        .has-text-align-left {
            text-align: left
        }

        .has-text-align-right {
            text-align: right
        }

        #end-resizable-editor-section {
            display: none
        }

        .aligncenter {
            clear: both
        }

        .items-justified-left {
            justify-content: flex-start
        }

        .items-justified-center {
            justify-content: center
        }

        .items-justified-right {
            justify-content: flex-end
        }

        .items-justified-space-between {
            justify-content: space-between
        }

        .screen-reader-text {
            clip: rect(1px, 1px, 1px, 1px);
            word-wrap: normal !important;
            border: 0;
            -webkit-clip-path: inset(50%);
            clip-path: inset(50%);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px
        }

        .screen-reader-text:focus {
            clip: auto !important;
            background-color: #ddd;
            -webkit-clip-path: none;
            clip-path: none;
            color: #444;
            display: block;
            font-size: 1em;
            height: auto;
            left: 5px;
            line-height: normal;
            padding: 15px 23px 14px;
            text-decoration: none;
            top: 5px;
            width: auto;
            z-index: 100000
        }

        html :where(.has-border-color) {
            border-style: solid
        }

        html :where([style*=border-top-color]) {
            border-top-style: solid
        }

        html :where([style*=border-right-color]) {
            border-right-style: solid
        }

        html :where([style*=border-bottom-color]) {
            border-bottom-style: solid
        }

        html :where([style*=border-left-color]) {
            border-left-style: solid
        }

        html :where([style*=border-width]) {
            border-style: solid
        }

        html :where([style*=border-top-width]) {
            border-top-style: solid
        }

        html :where([style*=border-right-width]) {
            border-right-style: solid
        }

        html :where([style*=border-bottom-width]) {
            border-bottom-style: solid
        }

        html :where([style*=border-left-width]) {
            border-left-style: solid
        }

        html :where(img[class*=wp-image-]) {
            height: auto;
            max-width: 100%
        }

        figure {
            margin: 0 0 1em
        }

        html :where(.is-position-sticky) {
            --wp-admin--admin-bar--position-offset: var(--wp-admin--admin-bar--height, 0px)
        }

        @media screen and (max-width:600px) {
            html :where(.is-position-sticky) {
                --wp-admin--admin-bar--position-offset: 0px
            }
        }
    </style>
    <style id="global-styles-inline-css">
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--color--base: #ffffff;
            --wp--preset--color--contrast: #000000;
            --wp--preset--color--primary: #9DFF20;
            --wp--preset--color--secondary: #345C00;
            --wp--preset--color--tertiary: #F6F6F6;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
            --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
            --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
            --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
            --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
            --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
            --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
            --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
            --wp--preset--font-size--small: clamp(0.875rem, 0.875rem + ((1vw - 0.48rem) * 0.24), 1rem);
            --wp--preset--font-size--medium: clamp(1rem, 1rem + ((1vw - 0.48rem) * 0.24), 1.125rem);
            --wp--preset--font-size--large: clamp(1.75rem, 1.75rem + ((1vw - 0.48rem) * 0.24), 1.875rem);
            --wp--preset--font-size--x-large: 2.25rem;
            --wp--preset--font-size--xx-large: clamp(4rem, 4rem + ((1vw - 0.48rem) * 11.538), 10rem);
            --wp--preset--font-family--dm-sans: "DM Sans", sans-serif;
            --wp--preset--font-family--ibm-plex-mono: 'IBM Plex Mono', monospace;
            --wp--preset--font-family--inter: "Inter", sans-serif;
            --wp--preset--font-family--system-font: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
            --wp--preset--font-family--source-serif-pro: "Source Serif Pro", serif;
            --wp--preset--spacing--30: clamp(1.5rem, 5vw, 2rem);
            --wp--preset--spacing--40: clamp(1.8rem, 1.8rem + ((1vw - 0.48rem) * 2.885), 3rem);
            --wp--preset--spacing--50: clamp(2.5rem, 8vw, 4.5rem);
            --wp--preset--spacing--60: clamp(3.75rem, 10vw, 7rem);
            --wp--preset--spacing--70: clamp(5rem, 5.25rem + ((1vw - 0.48rem) * 9.096), 8rem);
            --wp--preset--spacing--80: clamp(7rem, 14vw, 11rem);
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        body {
            margin: 0;
            --wp--style--global--content-size: 650px;
            --wp--style--global--wide-size: 1200px;
        }

        .wp-site-blocks {
            padding-top: var(--wp--style--root--padding-top);
            padding-bottom: var(--wp--style--root--padding-bottom);
        }

        .has-global-padding {
            padding-right: var(--wp--style--root--padding-right);
            padding-left: var(--wp--style--root--padding-left);
        }

        .has-global-padding :where(.has-global-padding) {
            padding-right: 0;
            padding-left: 0;
        }

        .has-global-padding>.alignfull {
            margin-right: calc(var(--wp--style--root--padding-right) * -1);
            margin-left: calc(var(--wp--style--root--padding-left) * -1);
        }

        .has-global-padding :where(.has-global-padding)>.alignfull {
            margin-right: 0;
            margin-left: 0;
        }

        .has-global-padding>.alignfull:where(:not(.has-global-padding))> :where([class*="wp-block-"]:not(.alignfull):not([class*="__"]), p, h1, h2, h3, h4, h5, h6, ul, ol) {
            padding-right: var(--wp--style--root--padding-right);
            padding-left: var(--wp--style--root--padding-left);
        }

        .has-global-padding :where(.has-global-padding)>.alignfull:where(:not(.has-global-padding))> :where([class*="wp-block-"]:not(.alignfull):not([class*="__"]), p, h1, h2, h3, h4, h5, h6, ul, ol) {
            padding-right: 0;
            padding-left: 0;
        }

        .wp-site-blocks>.alignleft {
            float: left;
            margin-right: 2em;
        }

        .wp-site-blocks>.alignright {
            float: right;
            margin-left: 2em;
        }

        .wp-site-blocks>.aligncenter {
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
        }

        .wp-site-blocks>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-site-blocks>*+* {
            margin-block-start: 1.5rem;
        }

        body {
            --wp--style--block-gap: 1.5rem;
        }

        body .is-layout-flow>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        body .is-layout-flow>*+* {
            margin-block-start: 1.5rem;
            margin-block-end: 0;
        }

        body .is-layout-constrained>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        body .is-layout-constrained>*+* {
            margin-block-start: 1.5rem;
            margin-block-end: 0;
        }

        body .is-layout-flex {
            gap: 1.5rem;
        }

        body .is-layout-flow>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-flow>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-flow>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-constrained>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-constrained>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex>* {
            margin: 0;
        }

        body {
            background-color: var(--wp--preset--color--base);
            color: var(--wp--preset--color--contrast);
            font-family: var(--wp--preset--font-family--system-font);
            font-size: var(--wp--preset--font-size--medium);
            line-height: 1.6;
            --wp--style--root--padding-top: var(--wp--preset--spacing--40);
            --wp--style--root--padding-right: var(--wp--preset--spacing--30);
            --wp--style--root--padding-bottom: var(--wp--preset--spacing--40);
            --wp--style--root--padding-left: var(--wp--preset--spacing--30);
        }

        a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--contrast);
            text-decoration: underline;
        }

        a:where(:not(.wp-element-button)):hover {
            text-decoration: none;
        }

        a:where(:not(.wp-element-button)):focus {
            text-decoration: underline dashed;
        }

        a:where(:not(.wp-element-button)):active {
            color: var(--wp--preset--color--secondary);
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 400;
            line-height: 1.4;
        }

        h1 {
            font-size: clamp(2.719rem, 2.719rem + ((1vw - 0.48rem) * 1.742), 3.625rem);
            line-height: 1.2;
        }

        h2 {
            font-size: clamp(2.625rem, calc(2.625rem + ((1vw - 0.48rem) * 8.4135)), 3.25rem);
            line-height: 1.2;
        }

        h3 {
            font-size: var(--wp--preset--font-size--x-large);
        }

        h4 {
            font-size: var(--wp--preset--font-size--large);
        }

        h5 {
            font-size: var(--wp--preset--font-size--medium);
            font-weight: 700;
            text-transform: uppercase;
        }

        h6 {
            font-size: var(--wp--preset--font-size--medium);
            text-transform: uppercase;
        }

        .wp-element-button,
        .wp-block-button__link {
            background-color: var(--wp--preset--color--primary);
            border-radius: 0;
            border-width: 0;
            color: var(--wp--preset--color--contrast);
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            padding: calc(0.667em + 2px) calc(1.333em + 2px);
            text-decoration: none;
        }

        .wp-element-button:visited,
        .wp-block-button__link:visited {
            color: var(--wp--preset--color--contrast);
        }

        .wp-element-button:hover,
        .wp-block-button__link:hover {
            background-color: var(--wp--preset--color--contrast);
            color: var(--wp--preset--color--base);
        }

        .wp-element-button:focus,
        .wp-block-button__link:focus {
            background-color: var(--wp--preset--color--contrast);
            color: var(--wp--preset--color--base);
        }

        .wp-element-button:active,
        .wp-block-button__link:active {
            background-color: var(--wp--preset--color--secondary);
            color: var(--wp--preset--color--base);
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-base-color {
            color: var(--wp--preset--color--base) !important;
        }

        .has-contrast-color {
            color: var(--wp--preset--color--contrast) !important;
        }

        .has-primary-color {
            color: var(--wp--preset--color--primary) !important;
        }

        .has-secondary-color {
            color: var(--wp--preset--color--secondary) !important;
        }

        .has-tertiary-color {
            color: var(--wp--preset--color--tertiary) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-base-background-color {
            background-color: var(--wp--preset--color--base) !important;
        }

        .has-contrast-background-color {
            background-color: var(--wp--preset--color--contrast) !important;
        }

        .has-primary-background-color {
            background-color: var(--wp--preset--color--primary) !important;
        }

        .has-secondary-background-color {
            background-color: var(--wp--preset--color--secondary) !important;
        }

        .has-tertiary-background-color {
            background-color: var(--wp--preset--color--tertiary) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-base-border-color {
            border-color: var(--wp--preset--color--base) !important;
        }

        .has-contrast-border-color {
            border-color: var(--wp--preset--color--contrast) !important;
        }

        .has-primary-border-color {
            border-color: var(--wp--preset--color--primary) !important;
        }

        .has-secondary-border-color {
            border-color: var(--wp--preset--color--secondary) !important;
        }

        .has-tertiary-border-color {
            border-color: var(--wp--preset--color--tertiary) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .has-xx-large-font-size {
            font-size: var(--wp--preset--font-size--xx-large) !important;
        }

        .has-dm-sans-font-family {
            font-family: var(--wp--preset--font-family--dm-sans) !important;
        }

        .has-ibm-plex-mono-font-family {
            font-family: var(--wp--preset--font-family--ibm-plex-mono) !important;
        }

        .has-inter-font-family {
            font-family: var(--wp--preset--font-family--inter) !important;
        }

        .has-system-font-font-family {
            font-family: var(--wp--preset--font-family--system-font) !important;
        }

        .has-source-serif-pro-font-family {
            font-family: var(--wp--preset--font-family--source-serif-pro) !important;
        }
    </style>
    <style id="wp-webfonts-inline-css">
        @font-face {
            font-family: "DM Sans";
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/dm-sans/DMSans-Regular.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: "DM Sans";
            font-style: italic;
            font-weight: 400;
            font-display: fallback;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/dm-sans/DMSans-Regular-Italic.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: "DM Sans";
            font-style: normal;
            font-weight: 700;
            font-display: fallback;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/dm-sans/DMSans-Bold.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: "DM Sans";
            font-style: italic;
            font-weight: 700;
            font-display: fallback;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/dm-sans/DMSans-Bold-Italic.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: "IBM Plex Mono";
            font-style: normal;
            font-weight: 300;
            font-display: block;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/ibm-plex-mono/IBMPlexMono-Light.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: "IBM Plex Mono";
            font-style: normal;
            font-weight: 400;
            font-display: block;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/ibm-plex-mono/IBMPlexMono-Regular.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: "IBM Plex Mono";
            font-style: italic;
            font-weight: 400;
            font-display: block;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/ibm-plex-mono/IBMPlexMono-Italic.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: "IBM Plex Mono";
            font-style: normal;
            font-weight: 700;
            font-display: block;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/ibm-plex-mono/IBMPlexMono-Bold.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: Inter;
            font-style: normal;
            font-weight: 200 900;
            font-display: fallback;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/inter/Inter-VariableFont_slnt,wght.ttf') format('truetype');
            font-stretch: normal;
        }

        @font-face {
            font-family: "Source Serif Pro";
            font-style: normal;
            font-weight: 200 900;
            font-display: fallback;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/source-serif-pro/SourceSerif4Variable-Roman.ttf.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: "Source Serif Pro";
            font-style: italic;
            font-weight: 200 900;
            font-display: fallback;
            src: url('{{url('')}}/public/wp-content/themes/twentytwentythree/assets/fonts/source-serif-pro/SourceSerif4Variable-Italic.ttf.woff2') format('woff2');
            font-stretch: normal;
        }
    </style>
    <link rel="stylesheet" id="elementor-icons-css"
        href="{{url('')}}/public/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.18.0"
        media="all">
    <link rel="stylesheet" id="elementor-frontend-css"
        href="{{url('')}}/public/wp-content/plugins/elementor/assets/css/frontend-lite.min.css?ver=3.12.2" media="all">
    <link rel="stylesheet" id="swiper-css"
        href="{{url('')}}/public/wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min.css?ver=8.4.5"
        media="all">
    <link rel="stylesheet" id="elementor-post-5-css"
        href="{{url('')}}/public/wp-content/uploads/elementor/css/post-5.css?ver=1684053359" media="all">
    <link rel="stylesheet" id="elementor-pro-css"
        href="{{url('')}}/public/wp-content/plugins/elementor-pro/assets/css/frontend-lite.min.css?ver=3.12.3"
        media="all">
    <link rel="stylesheet" id="elementor-global-css"
        href="{{url('')}}/public/wp-content/uploads/elementor/css/global.css?ver=1684053360" media="all">
    <link rel="stylesheet" id="elementor-post-147-css"
        href="{{url('')}}/public/wp-content/uploads/elementor/css/post-147.css?ver=1684055029" media="all">
    <link rel="stylesheet" id="google-fonts-1-css"
        href="https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.2"
        media="all">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="./../xmlrpc.php?rsd">
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{{url('')}}/public/wp-includes/wlwmanifest.xml">
    <meta name="generator" content="WordPress 6.2">
    <link rel="alternate" type="application/json+oembed"
        href="{{url('')}}/public/wp-json/oembed/1.0/embed/index.html?url=http%3A%2F%2F%2Fwebpay%2F">
    <link rel="alternate" type="text/xml+oembed"
        href="{{url('')}}/public/wp-json/oembed/1.0/embed/index.html?url=http%3A%2F%2F%2Fwebpay%2F#038;format=xml">
    <meta name="ssp-url">
    <meta name="ssp-origin-url" content="aHR0cDovL215ZGV2aG9zdC5jb20=">

    <meta name="ssp-config-url" content="/wp-content/uploads/simply-static/configs/">

    <meta name="generator"
        content="Elementor 3.12.2; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, a11y_improvements, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
</head>

<body
    class="page-template page-template-elementor_canvas page page-id-147 wp-embed-responsive elementor-default elementor-template-canvas elementor-kit-5 elementor-page elementor-page-147">
    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-dark-grayscale">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 0.49803921568627"></fefuncr>
                    <fefuncg type="table" tablevalues="0 0.49803921568627"></fefuncg>
                    <fefuncb type="table" tablevalues="0 0.49803921568627"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-grayscale">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 1"></fefuncr>
                    <fefuncg type="table" tablevalues="0 1"></fefuncg>
                    <fefuncb type="table" tablevalues="0 1"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-purple-yellow">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.54901960784314 0.98823529411765"></fefuncr>
                    <fefuncg type="table" tablevalues="0 1"></fefuncg>
                    <fefuncb type="table" tablevalues="0.71764705882353 0.25490196078431"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-blue-red">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 1"></fefuncr>
                    <fefuncg type="table" tablevalues="0 0.27843137254902"></fefuncg>
                    <fefuncb type="table" tablevalues="0.5921568627451 0.27843137254902"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-midnight">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 0"></fefuncr>
                    <fefuncg type="table" tablevalues="0 0.64705882352941"></fefuncg>
                    <fefuncb type="table" tablevalues="0 1"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-magenta-yellow">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.78039215686275 1"></fefuncr>
                    <fefuncg type="table" tablevalues="0 0.94901960784314"></fefuncg>
                    <fefuncb type="table" tablevalues="0.35294117647059 0.47058823529412"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-purple-green">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.65098039215686 0.40392156862745"></fefuncr>
                    <fefuncg type="table" tablevalues="0 1"></fefuncg>
                    <fefuncb type="table" tablevalues="0.44705882352941 0.4"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-blue-orange">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.098039215686275 1"></fefuncr>
                    <fefuncg type="table" tablevalues="0 0.66274509803922"></fefuncg>
                    <fefuncb type="table" tablevalues="0.84705882352941 0.41960784313725"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg>
    <div data-elementor-type="wp-page" data-elementor-id="147" class="elementor elementor-147">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-fd2eeef elementor-section-height-full elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
            data-id="fd2eeef" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-a739648"
                    data-id="a739648" data-element_type="column">
                    <div class="elementor-widget-wrap">
                    </div>
                </div>
                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-a731b53"
                    data-id="a731b53" data-element_type="column"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-f398b2d elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="f398b2d" data-element_type="section"
                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-eb3c755"
                                    data-id="eb3c755" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-75e749e elementor-widget elementor-widget-image"
                                            data-id="75e749e" data-element_type="widget"
                                            data-widget_type="image.default">
                                            <div class="elementor-widget-container">
                                                <style>
                                                    /*! elementor - v3.12.2 - 23-04-2023 */
                                                    .elementor-widget-image {
                                                        text-align: center
                                                    }

                                                    .elementor-widget-image a {
                                                        display: inline-block
                                                    }

                                                    .elementor-widget-image a img[src$=".svg"] {
                                                        width: 48px
                                                    }

                                                    .elementor-widget-image img {
                                                        vertical-align: middle;
                                                        display: inline-block
                                                    }
                                                </style> <img decoding="async" width="410" height="81"
                                                    src="{{url('')}}/public/wp-content/uploads/2023/05/logo-1-1.png"
                                                    class="attachment-large size-large wp-image-154" alt=""
                                                    srcset="{{url('')}}/public/wp-content/uploads/2023/05/logo-1-1.png 410w, {{url('')}}/public/wp-content/uploads/2023/05/logo-1-1-300x59.png 300w"
                                                    sizes="(max-width: 410px) 100vw, 410px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-70f432c"
                                    data-id="70f432c" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-a2f798f elementor-widget elementor-widget-heading"
                                            data-id="a2f798f" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <style>
                                                    /*! elementor - v3.12.2 - 23-04-2023 */
                                                    .elementor-heading-title {
                                                        padding: 0;
                                                        margin: 0;
                                                        line-height: 1
                                                    }

                                                    .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a {
                                                        color: inherit;
                                                        font-size: inherit;
                                                        line-height: inherit
                                                    }

                                                    .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                                        font-size: 15px
                                                    }

                                                    .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                                        font-size: 19px
                                                    }

                                                    .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                                        font-size: 29px
                                                    }

                                                    .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                                        font-size: 39px
                                                    }

                                                    .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                                        font-size: 59px
                                                    }
                                                </style>
                                                <h2 class="elementor-heading-title elementor-size-default">Amount to Pay
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-43fbf92 elementor-widget elementor-widget-text-editor"
                                            data-id="43fbf92" data-element_type="widget"
                                            data-widget_type="text-editor.default">
                                            <div class="elementor-widget-container">
                                                <style>
                                                    /*! elementor - v3.12.2 - 23-04-2023 */
                                                    .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                                        background-color: #69727d;
                                                        color: #fff
                                                    }

                                                    .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                                        color: #69727d;
                                                        border: 3px solid;
                                                        background-color: transparent
                                                    }

                                                    .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                                        margin-top: 8px
                                                    }

                                                    .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                                        width: 1em;
                                                        height: 1em
                                                    }

                                                    .elementor-widget-text-editor .elementor-drop-cap {
                                                        float: left;
                                                        text-align: center;
                                                        line-height: 1;
                                                        font-size: 50px
                                                    }

                                                    .elementor-widget-text-editor .elementor-drop-cap-letter {
                                                        display: inline-block
                                                    }
                                                </style>
                                                <p>NGN {{ number_format($payable_amount, 2) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-982d12d elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="982d12d" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-ffe85a9"
                                    data-id="ffe85a9" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-e00421a elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                            data-id="e00421a" data-element_type="widget"
                                            data-widget_type="divider.default">
                                            <div class="elementor-widget-container">
                                                <style>
                                                    /*! elementor - v3.12.2 - 23-04-2023 */
                                                    .elementor-widget-divider {
                                                        --divider-border-style: none;
                                                        --divider-border-width: 1px;
                                                        --divider-color: #0c0d0e;
                                                        --divider-icon-size: 20px;
                                                        --divider-element-spacing: 10px;
                                                        --divider-pattern-height: 24px;
                                                        --divider-pattern-size: 20px;
                                                        --divider-pattern-url: none;
                                                        --divider-pattern-repeat: repeat-x
                                                    }

                                                    .elementor-widget-divider .elementor-divider {
                                                        display: flex
                                                    }

                                                    .elementor-widget-divider .elementor-divider__text {
                                                        font-size: 15px;
                                                        line-height: 1;
                                                        max-width: 95%
                                                    }

                                                    .elementor-widget-divider .elementor-divider__element {
                                                        margin: 0 var(--divider-element-spacing);
                                                        flex-shrink: 0
                                                    }

                                                    .elementor-widget-divider .elementor-icon {
                                                        font-size: var(--divider-icon-size)
                                                    }

                                                    .elementor-widget-divider .elementor-divider-separator {
                                                        display: flex;
                                                        margin: 0;
                                                        direction: ltr
                                                    }

                                                    .elementor-widget-divider--view-line_icon .elementor-divider-separator,
                                                    .elementor-widget-divider--view-line_text .elementor-divider-separator {
                                                        align-items: center
                                                    }

                                                    .elementor-widget-divider--view-line_icon .elementor-divider-separator:after,
                                                    .elementor-widget-divider--view-line_icon .elementor-divider-separator:before,
                                                    .elementor-widget-divider--view-line_text .elementor-divider-separator:after,
                                                    .elementor-widget-divider--view-line_text .elementor-divider-separator:before {
                                                        display: block;
                                                        content: "";
                                                        border-bottom: 0;
                                                        flex-grow: 1;
                                                        border-top: var(--divider-border-width) var(--divider-border-style) var(--divider-color)
                                                    }

                                                    .elementor-widget-divider--element-align-left .elementor-divider .elementor-divider-separator>.elementor-divider__svg:first-of-type {
                                                        flex-grow: 0;
                                                        flex-shrink: 100
                                                    }

                                                    .elementor-widget-divider--element-align-left .elementor-divider-separator:before {
                                                        content: none
                                                    }

                                                    .elementor-widget-divider--element-align-left .elementor-divider__element {
                                                        margin-left: 0
                                                    }

                                                    .elementor-widget-divider--element-align-right .elementor-divider .elementor-divider-separator>.elementor-divider__svg:last-of-type {
                                                        flex-grow: 0;
                                                        flex-shrink: 100
                                                    }

                                                    .elementor-widget-divider--element-align-right .elementor-divider-separator:after {
                                                        content: none
                                                    }

                                                    .elementor-widget-divider--element-align-right .elementor-divider__element {
                                                        margin-right: 0
                                                    }

                                                    .elementor-widget-divider:not(.elementor-widget-divider--view-line_text):not(.elementor-widget-divider--view-line_icon) .elementor-divider-separator {
                                                        border-top: var(--divider-border-width) var(--divider-border-style) var(--divider-color)
                                                    }

                                                    .elementor-widget-divider--separator-type-pattern {
                                                        --divider-border-style: none
                                                    }

                                                    .elementor-widget-divider--separator-type-pattern.elementor-widget-divider--view-line .elementor-divider-separator,
                                                    .elementor-widget-divider--separator-type-pattern:not(.elementor-widget-divider--view-line) .elementor-divider-separator:after,
                                                    .elementor-widget-divider--separator-type-pattern:not(.elementor-widget-divider--view-line) .elementor-divider-separator:before,
                                                    .elementor-widget-divider--separator-type-pattern:not([class*=elementor-widget-divider--view]) .elementor-divider-separator {
                                                        width: 100%;
                                                        min-height: var(--divider-pattern-height);
                                                        -webkit-mask-size: var(--divider-pattern-size) 100%;
                                                        mask-size: var(--divider-pattern-size) 100%;
                                                        -webkit-mask-repeat: var(--divider-pattern-repeat);
                                                        mask-repeat: var(--divider-pattern-repeat);
                                                        background-color: var(--divider-color);
                                                        -webkit-mask-image: var(--divider-pattern-url);
                                                        mask-image: var(--divider-pattern-url)
                                                    }

                                                    .elementor-widget-divider--no-spacing {
                                                        --divider-pattern-size: auto
                                                    }

                                                    .elementor-widget-divider--bg-round {
                                                        --divider-pattern-repeat: round
                                                    }

                                                    .rtl .elementor-widget-divider .elementor-divider__text {
                                                        direction: rtl
                                                    }

                                                    .e-con-inner>.elementor-widget-divider,
                                                    .e-con>.elementor-widget-divider {
                                                        width: var(--container-widget-width, 100%);
                                                        --flex-grow: var(--container-widget-flex-grow)
                                                    }
                                                </style>
                                                <div class="elementor-divider">
                                                    <span class="elementor-divider-separator">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-cb00d95 elementor-widget elementor-widget-text-editor"
                                            data-id="cb00d95" data-element_type="widget"
                                            data-widget_type="text-editor.default">
                                            <div class="elementor-widget-container">
                                                <p>Make bank transfer  of the  exact amount to the account details
                                                    below.</p>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-15255a4 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                            data-id="15255a4" data-element_type="widget"
                                            data-widget_type="divider.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-divider">
                                                    <span class="elementor-divider-separator">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-1540237 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="1540237" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-d253308"
                                    data-id="d253308" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-ac8ffc6 elementor-widget elementor-widget-heading"
                                            data-id="ac8ffc6" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Account
                                                    Number</h2>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-fb291d4 elementor-widget elementor-widget-heading"
                                            data-id="fb291d4" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">{{
                                                    $v_account_no }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-802c2be"
                                    data-id="802c2be" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-535ee42 elementor-widget elementor-widget-heading"
                                            data-id="535ee42" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Account Name
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-68f9689 elementor-widget elementor-widget-heading"
                                            data-id="68f9689" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">
                                                    {{$v_account_name}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-0a786d0 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="0a786d0" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-f3c5aa5"
                                    data-id="f3c5aa5" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-1ecda5c elementor-widget elementor-widget-heading"
                                            data-id="1ecda5c" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Bank</h2>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-71f6773 elementor-widget elementor-widget-heading"
                                            data-id="71f6773" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">{{ $bank_name
                                                    }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-59b4a66"
                                    data-id="59b4a66" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-19be046 elementor-widget elementor-widget-heading"
                                            data-id="19be046" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Charges</h2>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-b42d03e elementor-widget elementor-widget-heading"
                                            data-id="b42d03e" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">NGN {{
                                                    $web_charges }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-7178a35 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="7178a35" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-36a313d"
                                    data-id="36a313d" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-8edda3d elementor-widget elementor-widget-heading"
                                            data-id="8edda3d" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Trx ID
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-f0ddce9 elementor-widget elementor-widget-heading"
                                            data-id="f0ddce9" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">{{ $trans_id
                                                    }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-de85719"
                                    data-id="de85719" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-d037bba elementor-widget elementor-widget-heading"
                                            data-id="d037bba" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Status
                                                     </h2>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-3230ce7 elementor-widget elementor-widget-heading"
                                            data-id="3230ce7" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Pending</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-00f77a4 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="00f77a4" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-5e4db6e"
                                    data-id="5e4db6e" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-a495f3f elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                            data-id="a495f3f" data-element_type="widget"
                                            data-widget_type="divider.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-divider">
                                                    <span class="elementor-divider-separator">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-9ff9b0f elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="9ff9b0f" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-06dd760"
                                    data-id="06dd760" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">



                                        <div class="elementor-element elementor-element-2591f69 elementor-align-justify elementor-widget elementor-widget-button"
                                            data-id="2591f69" data-element_type="widget"
                                            data-widget_type="button.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-button-wrapper">




                                                    <a href="/check-status?trans_id={{$trans_id}}&amount={{$payable_amount}}"
                                                            class="elementor-button elementor-size-sm">
                                                            <span>
                                                                <span class=" elementor-button-icon">
                                                                </span>
                                                                <span class="elementor-button-text">I've sent the money</span>
                                                            </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-1ea4797"
                                    data-id="1ea4797" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-328afe5 elementor-align-justify elementor-widget elementor-widget-button"
                                            data-id="328afe5" data-element_type="widget"
                                            data-widget_type="button.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-button-wrapper">
                                                    <a href="/decline?trans_id={{ $trans_id }}&key={{ $key }}&amount={{ $amount }}"
                                                        class="elementor-button-link elementor-button elementor-size-sm"
                                                        role="button">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Cancel</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-fc91093"
                    data-id="fc91093" data-element_type="column">
                    <div class="elementor-widget-wrap">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style id="skip-link-styles">
        .skip-link.screen-reader-text {
            border: 0;
            clip: rect(1px, 1px, 1px, 1px);
            clip-path: inset(50%);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute !important;
            width: 1px;
            word-wrap: normal !important;
        }

        .skip-link.screen-reader-text:focus {
            background-color: #eee;
            clip: auto !important;
            clip-path: none;
            color: #444;
            display: block;
            font-size: 1em;
            height: auto;
            left: 5px;
            line-height: normal;
            padding: 15px 23px 14px;
            text-decoration: none;
            top: 5px;
            width: auto;
            z-index: 100000;
        }
    </style>
    <script>
        (function () {
			var skipLinkTarget = document.querySelector('main'),
				sibling,
				skipLinkTargetID,
				skipLink;

			// Early exit if a skip-link target can't be located.
			if (!skipLinkTarget) {
				return;
			}

			// Get the site wrapper.
			// The skip-link will be injected in the beginning of it.
			sibling = document.querySelector('.wp-site-blocks');

			// Early exit if the root element was not found.
			if (!sibling) {
				return;
			}

			// Get the skip-link target's ID, and generate one if it doesn't exist.
			skipLinkTargetID = skipLinkTarget.id;
			if (!skipLinkTargetID) {
				skipLinkTargetID = 'wp--skip-link--target';
				skipLinkTarget.id = skipLinkTargetID;
			}

			// Create the skip link.
			skipLink = document.createElement('a');
			skipLink.classList.add('skip-link', 'screen-reader-text');
			skipLink.href = '#' + skipLinkTargetID;
			skipLink.innerHTML = 'Skip to content';

			// Inject the skip link.
			sibling.parentElement.insertBefore(skipLink, sibling);
		}());
    </script>
    <span class="ssp-id" style="display:none">147</span>
    <script src="{{url('')}}/public/wp-content/plugins/elementor-pro/assets/js/webpack-pro.runtime.min.js?ver=3.12.3"
        id="elementor-pro-webpack-runtime-js"></script>
    <script src="{{url('')}}/public/wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.12.2"
        id="elementor-webpack-runtime-js"></script>
    <script src="{{url('')}}/public/wp-includes/js/jquery/jquery.min.js?ver=3.6.3" id="jquery-core-js"></script>
    <script src="{{url('')}}/public/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.0" id="jquery-migrate-js">
    </script>
    <script src="{{url('')}}/public/wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.12.2"
        id="elementor-frontend-modules-js"></script>
    <script src="{{url('')}}/public/wp-includes/js/dist/vendor/wp-polyfill-inert.min.js?ver=3.1.2"
        id="wp-polyfill-inert-js"></script>
    <script src="{{url('')}}/public/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.13.11"
        id="regenerator-runtime-js"></script>
    <script src="{{url('')}}/public/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=3.15.0" id="wp-polyfill-js">
    </script>
    <script src="{{url('')}}/public/wp-includes/js/dist/hooks.min.js?ver=4169d3cf8e8d95a3d6d5" id="wp-hooks-js">
    </script>
    <script src="{{url('')}}/public/wp-includes/js/dist/i18n.min.js?ver=9e794f35a71bb98672ae" id="wp-i18n-js"></script>
    <script id="wp-i18n-js-after">
        wp.i18n.setLocaleData({ 'text directionltr': ['ltr'] });
    </script>
    <script id="elementor-pro-frontend-js-before">
        var ElementorProFrontendConfig = { "ajaxurl": ".\/\/wp-admin\/admin-ajax.php", "nonce": "854c503772", "urls": { "assets": ".\/\/wp-content\/plugins\/elementor-pro\/assets\/", "rest": ".\/\/wp-json\/" }, "shareButtonsNetworks": { "facebook": { "title": "Facebook", "has_counter": true }, "twitter": { "title": "Twitter" }, "linkedin": { "title": "LinkedIn", "has_counter": true }, "pinterest": { "title": "Pinterest", "has_counter": true }, "reddit": { "title": "Reddit", "has_counter": true }, "vk": { "title": "VK", "has_counter": true }, "odnoklassniki": { "title": "OK", "has_counter": true }, "tumblr": { "title": "Tumblr" }, "digg": { "title": "Digg" }, "skype": { "title": "Skype" }, "stumbleupon": { "title": "StumbleUpon", "has_counter": true }, "mix": { "title": "Mix" }, "telegram": { "title": "Telegram" }, "pocket": { "title": "Pocket", "has_counter": true }, "xing": { "title": "XING", "has_counter": true }, "whatsapp": { "title": "WhatsApp" }, "email": { "title": "Email" }, "print": { "title": "Print" } }, "facebook_sdk": { "lang": "en_US", "app_id": "" }, "lottie": { "defaultAnimationUrl": ".\/\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json" } };
    </script>
    <script src="{{url('')}}/public/wp-content/plugins/elementor-pro/assets/js/frontend.min.js?ver=3.12.3"
        id="elementor-pro-frontend-js"></script>
    <script src="{{url('')}}/public/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2"
        id="elementor-waypoints-js"></script>
    <script src="{{url('')}}/public/wp-includes/js/jquery/ui/core.min.js?ver=1.13.2" id="jquery-ui-core-js"></script>
    <script id="elementor-frontend-js-before">
        var elementorFrontendConfig = { "environmentMode": { "edit": false, "wpPreview": false, "isScriptDebug": false }, "i18n": { "shareOnFacebook": "Share on Facebook", "shareOnTwitter": "Share on Twitter", "pinIt": "Pin it", "download": "Download", "downloadImage": "Download image", "fullscreen": "Fullscreen", "zoom": "Zoom", "share": "Share", "playVideo": "Play Video", "previous": "Previous", "next": "Next", "close": "Close" }, "is_rtl": false, "breakpoints": { "xs": 0, "sm": 480, "md": 768, "lg": 1025, "xl": 1440, "xxl": 1600 }, "responsive": { "breakpoints": { "mobile": { "label": "Mobile Portrait", "value": 767, "default_value": 767, "direction": "max", "is_enabled": true }, "mobile_extra": { "label": "Mobile Landscape", "value": 880, "default_value": 880, "direction": "max", "is_enabled": false }, "tablet": { "label": "Tablet Portrait", "value": 1024, "default_value": 1024, "direction": "max", "is_enabled": true }, "tablet_extra": { "label": "Tablet Landscape", "value": 1200, "default_value": 1200, "direction": "max", "is_enabled": false }, "laptop": { "label": "Laptop", "value": 1366, "default_value": 1366, "direction": "max", "is_enabled": false }, "widescreen": { "label": "Widescreen", "value": 2400, "default_value": 2400, "direction": "min", "is_enabled": false } } }, "version": "3.12.2", "is_static": false, "experimentalFeatures": { "e_dom_optimization": true, "e_optimized_assets_loading": true, "e_optimized_css_loading": true, "a11y_improvements": true, "additional_custom_breakpoints": true, "e_swiper_latest": true, "theme_builder_v2": true, "landing-pages": true, "page-transitions": true, "notes": true, "loop": true, "form-submissions": true, "e_scroll_snap": true }, "urls": { "assets": ".\/\/wp-content\/plugins\/elementor\/assets\/" }, "swiperClass": "swiper", "settings": { "page": [], "editorPreferences": [] }, "kit": { "body_background_background": "classic", "active_breakpoints": ["viewport_mobile", "viewport_tablet"], "global_image_lightbox": "yes", "lightbox_enable_counter": "yes", "lightbox_enable_fullscreen": "yes", "lightbox_enable_zoom": "yes", "lightbox_enable_share": "yes", "lightbox_title_src": "title", "lightbox_description_src": "description" }, "post": { "id": 147, "title": "Webpay%20%E2%80%93%20JOBS4TN.GOV%20%E2%80%93%20Login%20and%20Registration%20Options", "excerpt": "", "featuredImage": false } };
    </script>
    <script src="{{url('')}}/public/wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.12.2"
        id="elementor-frontend-js"></script>
    <script src="{{url('')}}/public/wp-content/plugins/elementor-pro/assets/js/elements-handlers.min.js?ver=3.12.3"
        id="pro-elements-handlers-js"></script>
</body>

</html>

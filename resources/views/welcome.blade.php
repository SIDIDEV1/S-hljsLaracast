<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/styles/default.min.css">
    <title>Vite App</title>
  </head>
  <body>
    <div>
      <textarea name="markdown" id="" cols="30" rows="10"></textarea>
      <div><button>Convert to HTML</button></div>
    </div>
    <div id="render-here" class="">

    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/13.0.1/markdown-it.min.js" integrity="sha512-SYfDUYPg5xspsG6OOpXU366G8SZsdHOhqk/icdrYJ2E/WKZxPxze7d2HD3AyXpT7U22PZ5y74xRpqZ6A2bJ+kQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      const button = document.querySelector('button')

      button.addEventListener('click', () => {
        const markdownToRender = document.querySelector('textarea').value;
        const renderHere = document.querySelector('#render-here');

        // var md = window.markdownit();
        var md = window.markdownit({
          highlight: function (str, lang) {
            if (lang && hljs.getLanguage(lang)) {
              try {
                return hljs.highlight(str, { language: lang }).value;
              } catch (__) {}
            }

            return ''; // use external default escaping
          }
        });
        var result = md.render(markdownToRender);

        renderHere.innerHTML = result
      })
    </script>
  </body>
</html>



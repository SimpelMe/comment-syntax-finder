<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="author" content="Simpel">
    <meta name="copyright" content="MIT 2021 Simpel">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes user-scalable=no">
    <title>Comment Syntax</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <nav>
        <a id="logo" class="cursordefault" href="/"><img src="../Simpel.png" alt="simpel icon" height="48" width="48"></a>
        <h1>Comment Syntax</h1>
        <a id="github" href="https://github.com/SimpelMe/comment-syntax-finder" target="_blank" title="watch source code">
          <img id="github-cat" src="../github.svg" alt="github logo">
        </a>
      </nav>
    </header>
    <main>
      <div>
        <label for="searchinput">Search language or comment syntax:</label>
        <input type="search" id="searchinput" onkeyup="searchSyntax()" onsearch="searchSyntax()" title="Type in a scripting language or comments syntax" placeholder="search string …" autofocus>
        <table id="resulttable">
          <thead>
            <tr>
              <th>programming / scripting language</th>
              <th>comments syntax (~ represents text)</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $file = fopen("comments.csv", "r");
              // Fetching data from csv file row by row
              while (($data = fgetcsv($file)) !== false) {
                // HTML tag for placing in row format
                echo "<tr>";
                foreach ($data as $i) {
                  echo "<td>" . htmlspecialchars($i, ENT_QUOTES, 'UTF-8', false) . "</td>";
                }
                echo "</tr> \n";
              }
              fclose($file);
            ?>
          </tbody>
        </table>
      </div>
    </main>
    <footer>
      <p>sources:</p>
      <ul>
        <li class="source"><a href="https://en.wikipedia.org/wiki/Comparison_of_programming_languages_(syntax)" target="_blank">en.wikipedia.org/wiki/Comparison_of_programming_languages_(syntax)</a></li>
        <li class="source"><a href="http://rigaux.org/language-study/syntax-across-languages/Vrs.html" target="_blank">rigaux.org/language-study/syntax-across-languages/Vrs.html</a></li>
      </ul>
    </footer>
  </body>
  <script>
  function searchSyntax() {
    var input, filter, table, tr, tdOne, tdTwo, i, txtValue;
    input = document.getElementById("searchinput");
    filter = input.value.toUpperCase();
    table = document.getElementById("resulttable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      tdOne = tr[i].getElementsByTagName("td")[0];
      tdTwo = tr[i].getElementsByTagName("td")[1];
      if (tdOne || tdTwo) {
        txtValue = tdOne.innerText;
        txtValue += tdTwo.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  </script>
</html>

<html lang="en">

<head>
  <?php include dirname($_SERVER['DOCUMENT_ROOT']) . "/simpel.cc/php/head.php"; ?>
  <link rel="stylesheet" href="style.min.css">
</head>

<body>
  <header>
    <?php include dirname($_SERVER['DOCUMENT_ROOT']) . "/simpel.cc/php/header.php"; ?>
  </header>
  <main>
    <div>
      <label for="searchinput">Search language or comment syntax:</label>
      <input type="search" id="searchinput" onkeyup="searchSyntax()" onsearch="searchSyntax()"
        title="Type in a scripting language or comments syntax" placeholder="search string …" autofocus>
      <table id="resulttable">
        <thead>
          <tr>
            <th title="programming, scripting or markdown language">language</th>
            <th title="line (L) or multiline (M) comment">type</th>
            <th>comment syntax</th>
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
      <li class="source"><a href="https://en.wikipedia.org/wiki/Comparison_of_programming_languages_(syntax)"
          target="_blank">en.wikipedia.org/wiki/Comparison_of_programming_languages_(syntax)</a></li>
      <li class="source"><a href="http://rigaux.org/language-study/syntax-across-languages/Vrs.html"
          target="_blank">rigaux.org/language-study/syntax-across-languages/Vrs.html</a></li>
      <li class="source"><a href="https://pldb.com/languages/line-comments-feature.html"
          target="_blank">pldb.com/languages/line-comments-feature.html</a></li>
      <li class="source"><a href="https://pldb.com/languages/multiline-comments-feature.html"
          target="_blank">pldb.com/languages/multiline-comments-feature.html</a></li>
    </ul>
  </footer>
</body>
<script>
  function searchSyntax() {
    var input, filter, table, tr, tdOne, tdThree, i, txtValue;
    input = document.getElementById("searchinput");
    filter = input.value.toUpperCase();
    table = document.getElementById("resulttable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      tdOne = tr[i].getElementsByTagName("td")[0];
      tdThree = tr[i].getElementsByTagName("td")[2];
      if (tdOne || tdThree) {
        txtValue = tdOne.innerText;
        txtValue += tdThree.innerText;
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
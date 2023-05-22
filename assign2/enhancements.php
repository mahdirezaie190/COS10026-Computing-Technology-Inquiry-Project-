
<?php 
$title="Website Enhancements";
include 'header.inc';
?> 

<body>


<?php 
include 'menu.inc';
?>

    <div class="enhance-container">
    <div class="enhance-header">
      <h1>Implemented Enhancements</h1>
    </div>

   <div class="enhance-table">
    <table>
      <tr>
        <td class="table-col1">enhancement</td>
        <td class="table-col2">Responsive Web Design</td>
      </tr>
      <tr>
        <td class="table-col1">description</td>
        <td class="table-col2">Using media queries, the layout of our pages will change according to the screen size.</td>
      </tr>
      <tr>
        <td class="table-col1">code required</td>
        <td class="table-col2">@media all and (max-width: 900px){...}<br>
          @media all and (max-width: 480px){...}
        </td>
      </tr>
      <tr>
        <td class="table-col1">link</td>
        <td class="table-col2"><a href="about.html">try resizing the about page!</a></td>
      </tr>
    </table>
   </div>


    <div class="enhance-table">
      <table>
        <tr>
          <td class="table-col1">enhancement</td>
          <td class="table-col2">Animated Navigation Bar</td>
        </tr>
        <tr>
          <td class="table-col1">description</td>
          <td class="table-col2">Using keyframes, the background of the navigation bar shifts between several colors.</td>
        </tr>
        <tr>
          <td class="table-col1">code required</td>
          <td class="table-col2">@keyframes gradient {...}</td>
        </tr>
        <tr>
          <td class="table-col1">link</td>
          <td class="table-col2"><a href="index.html">Click here to see the navigation bar!</a></td>
        </tr>
      </table>
    </div>
  </div>





<?php
include 'footer.inc';
?>

  </body>
</html>
<?php

require_once('connection.php');

// $search = '';
// if (isset($_GET['search'])) {
//   $search = $_GET['search'];
// }

// $q = "SELECT * FROM ciudades WHERE ciudad LIKE " .  "'%$search%'";
// $t = mysqli_query($mysqli, $q);

// $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// $total = $t->num_rows;
// $limit = 4;
// $cantPage = ceil($total / $limit);
// $start =  ($page - 1) * $limit;

$query = "SELECT * FROM carrito";
$results = mysqli_query($mysqli, $query);

?>

<?php include_once('header.php') ?>

<div class="box ">
  <div class="relativeshadow-md sm:rounded-lg">

    <table class="w-full mb-6 text-sm text-left text-gray-500 dark:text-gray-500">
      <thead class="text-xs text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
        <tr>
          <th scope="col" class="px-6 py-3">
            ID
          </th>
          <th scope="col" class="px-6 py-3">
            producto
          </th>
          <th scope="col" class="px-6 py-3">
            Precio
          </th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while ($res = mysqli_fetch_array($results)) { ?>
        <tr
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 dark:hover:text-gray-100">

          <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
            <?= $res['id'] ?>
          </th>
          <td class="px-6 py-4">
            <?= $res['product'] ?>
          </td>
          <td class="px-6 py-4">
            <?= $res['price'] ?>
          </td>
          <td class="px-6 py-4 text-right">
            <a href="#" class="font-medium text-blue-600 mr-4 dark:text-blue-400 hover:underline">Editar</a>
            <a href="#" class="font-medium text-red-600 dark:text-red-300 hover:underline">Borrar</a>
          </td>
        </tr>
        <?php } ?>


      </tbody>
    </table>

  </div>
</div>

<?php include_once('footer.php') ?>
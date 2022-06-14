<?php

require_once('connection.php');

$search = '';
if (isset($_GET['search'])) {
  $search = $_GET['search'];
}

$q = "SELECT * FROM ciudades WHERE ciudad LIKE " .  "'%$search%'";
$t = mysqli_query($mysqli, $q);

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$total = $t->num_rows;
$limit = 4;
$cantPage = ceil($total / $limit);
$start =  ($page - 1) * $limit;

$query = "SELECT * FROM ciudades WHERE ciudad LIKE " .  "'%$search%'" . " order by id desc LIMIT $start,$limit";
$results = mysqli_query($mysqli, $query);

?>

<?php include_once('header.php') ?>

<div class="box ">
  <div class="relativeshadow-md sm:rounded-lg">
    <div class="flex my-4 justify-between items-center">
      <form action="" method="GET" class="w-80">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"></path>
            </svg>
          </div>
          <input type="search" id="table-search" name="search" value="<?= $search ?>"
            class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 !pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Buscar por nombre de la Ciudad">
        </div>
      </form>
      <a href="create.php" type="button" title="Agregar Cuidad"
        class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
          stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
      </a>
    </div>
    <table class="w-full mb-6 text-sm text-left text-gray-500 dark:text-gray-500">
      <thead class="text-xs text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
        <tr>
          <th scope="col" class="px-6 py-3">
            ID
          </th>
          <th scope="col" class="px-6 py-3">
            ciudad
          </th>
          <th scope="col" class="px-6 py-3">
            país
          </th>
          <th scope="col" class="px-6 py-3">
            habitantes
          </th>
          <th scope="col" class="px-6 py-3">
            superficie
          </th>
          <th scope="col" class="px-6 py-3">
            tiene Metro
          </th>
          <th scope="col" class="px-6 py-3">
            <span class="sr-only">Acciones</span>
          </th>
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
            <?= $res['ciudad'] ?>
          </td>
          <td class="px-6 py-4">
            <?= $res['pais'] ?>
          </td>
          <td class="px-6 py-4">
            <?= $res['habitantes'] ?>
          </td>
          <td class="px-6 py-4">
            <?= $res['superficie'] ?>
          </td>
          <td class="px-6 py-4">
            <?= $res['tieneMetro'] ?>
          </td>
          <td class="px-6 py-4 text-right">
            <a href="edit.php?id=<?= $res['id'] ?>"
              class="font-medium text-blue-600 mr-4 dark:text-blue-400 hover:underline">Editar</a>
            <a href="delete.php?id=<?= $res['id'] ?>"
              class="font-medium text-red-600 dark:text-red-300 hover:underline">Borrar</a>
          </td>
        </tr>
        <?php } ?>


      </tbody>
    </table>

    <nav aria-label="Page navigation example">
      <ul class="inline-flex -space-x-px">
        <li>
          <a href="index.php?page=<?= $page - 1 != 0 ?  $page - 1 : 1 ?> <?= isset($_GET['search']) ? '&search=' . $_GET['search'] : ''  ?>"
            class="<?= $page - 1 == 0 ? 'disabled ' : '' ?> py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-blue-500 hover:text-gray-100 dark:bg-blue-500 dark:border-gray-700 dark:text-gray-100 dark:hover:bg-blue-700 dark:hover:text-white">Previous</a>
        </li>

        <?php for ($i = 1; $i <= $cantPage; $i++) { ?>
        <li>
          <a href="index.php?page=<?= $i ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : ''  ?>"
            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $i ?></a>
        </li>

        <?php } ?>
        <li>
          <a href="index.php?page=<?= $page + 1 ?> <?= isset($_GET['search']) ? '&search=' . $_GET['search'] : ''  ?>"
            class=" <?= $page + 1 > $cantPage ? 'disabled ' : '' ?> py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-blue-800 dark:border-gray-700 dark:text-white dark:hover:bg-blue-700 dark:hover:text-white">Next</a>
        </li>
      </ul>
    </nav>
  </div>


</div>
<?php if (isset($_COOKIE['success'])) { ?>

<div
  class="alert-success absolute right-2 top-3 p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
  role="alert">
  <span class="font-medium">Great Job!</span> <?= $_COOKIE['success'] ?>
</div>
<?php } ?>


<?php include_once('footer.php') ?>

<script>
const alert = document.querySelector('.alert-success');
if (alert) {
  setTimeout(() => {
    alert.classList.add('hidden');
  }, 5000);
}
</script>
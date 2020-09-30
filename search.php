<?php
include("includes/includedFiles.php");

if (isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
} else {
    $term = "";
}

?>

<div class="searchContainer">
    <h4>Search for an artist, album or song</h4>
    <label>
        <input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing...">
    </label>
</div>

<script>

    $(function () {
        var timer;

        $(".searchInput").keyup(function () {
            clearTimeout(timer)

            timer = setTimeout(function () {
                console.log("hi");
            }, 2000);
        })
    })

</script>



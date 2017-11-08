<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Home | Demo Site</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="home-page sidebar-layout">
    <header id="header">
        <h2 class="site-title">Demo Site</h2>
    </header>

    <?php
        include_once 'dbcon.php';
        include_once 'navigation.php';
    ?>

    <div id="content-container">
        <main id="main-content">

            <?php
                $stmt = $conn->prepare("SELECT * FROM content WHERE contentType = 'Home'");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    echo $row['contentTitle'];
                    echo $row['contentText'];
                }
            ?>

        </main>

        <aside id="sidebar">
            <section>
                <?php
                    $stmt = $conn->prepare("SELECT * FROM sidebar");
                    $stmt->execute();

                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($result as $row) {
                        echo $row['sidebarTitle'];
                        echo $row['sidebarText'];
                    }
                ?>
            </section>
        </aside>

    </div>

    <?php include 'footer.php' ?>

</body>
</html>

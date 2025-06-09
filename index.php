<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="./images/favicon.ico">
    <link rel="icon" type="image/png" href="./images/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="./images/favicon-16x16.png" sizes="16x16"/>


    <title>La Elegancia de Vue.js 3</title>

    <!--Bootstrap CSS from node_modules-->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="./css/starter-template.css" rel="stylesheet">


</head>
<body>
<div id="app"><!--#app-->


    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">La Elegancia de Vue.js 3</a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="https://leanpub.com/vuejs2-spanish" target="_blank">Libro</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">Documentación </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="https://vuejs.org/v2/guide/" target="_blank">Vue.js 2</a>
                        <a class="dropdown-item" href="https://vuex.vuejs.org/en/" target="_blank">Vuex</a>
                        <a class="dropdown-item" href="https://v4-alpha.getbootstrap.com/getting-started/introduction/"
                           target="_blank">Bootstrap
                            4</a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">Ejemplos</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="https://vuejs.org/v2/examples/" target="_blank">Vue.js 2</a>
                        <a class="dropdown-item" href="https://vuex.vuejs.org/en/getting-started.html"
                           target="_blank">Vuex</a>
                        <a class="dropdown-item" href="https://v4-alpha.getbootstrap.com/examples/" target="_blank">Bootstrap
                            4</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" @submit.prevent="search(searchstr)">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar..." v-model="searchstr">
            </form>
        </div>
    </nav>

    <div class="container">

        <div class="starter-template">

            <table class="table table-hover mytable">
                <tbody id="list">

                <tr v-for="(value, index) in dirs" v-bind:class="value.visible">
                    <th>
                        <small v-bind:class="thClassValue(value.status)">&nbsp;&nbsp;{{index+1}}&nbsp;&nbsp;</small>
                        <a v-bind:href="value.dir">{{ value.dir }}</a>
                    </th>
                    <th>
                        <small>{{ value.description }}</small>
                    </th>
                </tr>

                </tbody>
            </table>
        </div>

    </div><!-- /.container -->

</div><!--/#app-->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!--BOOTSTRAP-->
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!--VUE-->
<script src="./node_modules/vue/dist/vue.global.js"></script>

<!--VUE-RESOURCE (removed - not compatible with Vue 3, use axios instead)-->

<!--VUEX-->
<script src="./node_modules/vuex/dist/vuex.global.js"></script>

<!--AXIOS-->
<script src="./node_modules/axios/dist/axios.min.js"></script>

<!--main-->
<script type="text/javascript">
    const { createApp } = Vue;
    
    const app = createApp({
        data() {
            return {
                searchstr: "",
                dirs: <?php
                // GET DIRECTORY TO VUE 3 DATA ARRAY
                $dir = '.';
                $descriptionFile = "index.txt";

                $a_bg = array('primary', 'success', 'warning', 'danger', 'info', 'muted');
                $ignoredFolders = array('.', '..', '.git', '.idea', '.svn', 'css', 'images', 'js', 'vendor', 'images', 'node_modules');

                foreach (glob('*', GLOB_ONLYDIR) as $dir) {

                    if (!in_array($dir, $ignoredFolders)) {
                        $a_dirs[]["dir"] = basename($dir);
                    }
                }

                foreach ($a_dirs as $key => $value) {
                    if (file_exists("./" . $value["dir"] . "/danger.txt")) {
                        $a_dirs[$key]["status"] = "danger";
                    } elseif (file_exists("./" . $value["dir"] . "/warning.txt")) {
                        $a_dirs[$key]["status"] = "warning";
                    } elseif (file_exists("./" . $value["dir"] . "/info.txt")) {
                        $a_dirs[$key]["status"] = "info";
                    } elseif (file_exists("./" . $value["dir"] . "/primary.txt")) {
                        $a_dirs[$key]["status"] = "primary";
                    } elseif (file_exists("./" . $value["dir"] . "/success.txt")) {
                        $a_dirs[$key]["status"] = "success";
                    } else {
                        $a_dirs[$key]["status"] = "muted";
                    }

                    // VISIBLE CLASS FOR SEARCH
                    $a_dirs[$key]["visible"] = "visible";

                    // DESCRIPTIONS FOR EVERY FOLDER
                    $description_file = "index.txt";
                    if (file_exists("./" . $value["dir"] . "/$description_file")) {
                        $a_dirs[$key]["description"] = file_get_contents("./" . $value["dir"] . "/$description_file");
                    }

                }

                echo json_encode($a_dirs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

                ?>
            }
        },
        methods: {
            thClassValue(status) {
                if (status == "danger") {
                    return ('bg-danger text-white')
                } else if (status == "warning") {
                    return ('bg-warning text-white')
                } else if (status == "info") {
                    return ('bg-info text-white')
                } else if (status == "primary") {
                    return ('bg-primary text-white')
                } else if (status == "success") {
                    return ('bg-success text-white')
                } else {
                    return ('bg-muted text-black')
                }
            },
            search(searchstr) {
                //console.log("DEBUG methods search:" + searchstr);
                //this.dirs[0]['dir']="kk";
                return this.dirs.map(function (element) {
                    if (element.dir.search(searchstr) == -1) {
                        return element.visible = "d-none"; // invisible? small? d-none?
                    } else {
                        return element.visible = "visible";
                    }
                })
            }
        }
    });

    app.mount('#app');
</script>


</body>
</html>

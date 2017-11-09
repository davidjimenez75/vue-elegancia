<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="/images/favicon.ico">
    <link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16"/>


    <title>VueBox</title>

    <!--bower_Bootstrap4a6_css-->
    <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/starter-template.css" rel="stylesheet">


</head>
<body>
<div id="app"><!--#app-->


    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">VueBox</a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://vuejs.org/v2/guide/" target="_blank">Vue.js 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://vuex.vuejs.org/en/" target="_blank">Vuex</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://v4-alpha.getbootstrap.com/getting-started/introduction/"
                       target="_blank">Bootstrap 4</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">Examples</a>
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
                <input class="form-control mr-sm-2" type="text" placeholder="Search" v-model="searchstr">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">

        <div class="starter-template">

            <table class="table table-hover mytable">
                <tbody id="list">

                <tr v-for="(value, index) in dirs"  v-bind:class="value.visible">
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
<script src="/vendor/jquery/dist/jquery.slim.min.js"></script>
<script src="/vendor/tether/dist/js/tether.min.js"></script>
<script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!--VUE-->
<script src="/vendor/vue/dist/vue.js"></script>

<!--VUE-RESOURCE-->
<!-- <script src="/vendor/vue-resource/dist/vue-resource.js"></script> -->

<!--VUEX-->
<!-- <script src="/vendor/vuex/dist/vuex.js"></script> -->

<!--AXIOS-->
<!-- <script src="/vendor/axios/dist/axios.js"></script> -->

<!--main-->
<script type="text/javascript">
    new Vue({
        el: '#app',
        data: {
            searchstr: "",
            dirs: <?php
            // GET DIRECTORY TO VUE 2 DATA ARRAY
            $dir = '.';
            $descriptionFile = "index.txt";

            $a_bg = array('primary', 'success', 'warning', 'danger', 'info', 'muted');
            $ignoredFolders = array('.', '..', '.git', '.idea', '.svn', 'css', 'images', 'js', 'vendor', 'images');

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
                $description_file="index.txt";
                if (file_exists("./" . $value["dir"] . "/$description_file")) {
                    $a_dirs[$key]["description"] = file_get_contents("./" . $value["dir"] . "/$description_file");
                }

            }



            echo json_encode($a_dirs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);

            ?>

        },
        methods: {
            thClassValue: function (status) {

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
            search: function (searchstr) {
                //console.log("DEBUG methods search:" + searchstr);
                //this.dirs[0]['dir']="kk";
                return this.dirs.map(function (element){
                    if (element.dir.search(searchstr)==-1) {
                        return element.visible= "d-none"; // invisible? small? d-none?
                    }else {
                        return element.visible = "visible";
                    }
                })

            }
        }
    })
</script>


</body>
</html>

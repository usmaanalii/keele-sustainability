<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/Chart.bundle.js"></script>
    <!-- Custom script -->
    <script src="../src/js/script1.js"></script>
    <link rel="stylesheet" href="bower_components/normalize-css/normalize.css">
    <!--
        - I replaced the bower normalize.css css with the code from the link
        - https://necolas.github.io/normalize.css/6.0.0/normalize.css
        -
        - This was due to the bower installed normalize not working on iphones
    -->
    <link rel="stylesheet" href="../src/css/grid.min.css">
    <link rel="stylesheet" href="../src/css/main.css">
    <title>Sustainability Site</title>
</head>

<body>

    <!-- David
        - input-measurement-area -> input-text-area
    -->
    <div class="log" id="log">
        <p class="log" id="greet"></p>
    </div>

    <header>
        <img src="../src/img/svg/recycling-logo.svg" alt="Recycle Logo">
        <span>Recycling</span>
    </header>

    <!--
        - Flexbox is used to create the responsive grid
        = The <ul> wraps all widgets
        - Each widget is put into it's own <li> tag
        - The code can be seen in ../src/css/sass/grid.scss
        - A more in depth explanation can be found at the following link
        https://css-tricks.com/snippets/css/a-guide-to-flexbox/
    -->
    <ul class="flex-container">
        <li class="flex-item">
            <!-- Widget 1 -->
            <div class="widget-container paper-widget">

                <div class="material-details">
                    <h1 class="material-name">Paper</h1>
                    <h2 id="paperup" class="material-measurement">12.6<span class="metric">kg</span></h2>
                </div>

                <button class="graphopen" value="paper">Graph</button>
                <button class="recordopen" value="paper">Records</button>

                <div class="add-button-style">
                    <!--
                        - All buttons have an id with the name of the
                        current material
                        - This is purely for the jquery onclick event that
                        displays the add info section
                        - The jquery function targets the children of each
                        'add-button-style' class seperately
                        - Further explanation is detailed in the widget.js file
                    -->
                    <button id="paper"><div class="button-value">+</div></button>
                </div>

            </div>

            <div class="add-info-container add-paper-info">

                <form class="input-form" action="">
                    <p id="paperput">Please enter the new measurement:</p>
                    <input id="paper-input" class="input-measurement-area" type="number" name="paper-input" value="Type measurement here">
                    <input class="form-submit-button" type="submit" value="Add">
                </form>

            </div>
        </li>

        <li class="flex-item">
            <!-- Widget 2 -->
            <div class="widget-container compost-widget">
                <div class="material-details">
                    <h1 class="material-name">Compost</h1>
                    <h2 id="compostup" class="material-measurement">8.4<span class="metric">kg</span></h2>
                </div>

                <button class="graphopen" value="compost">Graph</button>
                <button class="recordopen" value="compost">Records</button>

                <div class="add-button-style">
                    <button id="compost"><div class="button-value">+</div></button>
                </div>
            </div>
            <div class="add-info-container add-compost-info">

                <form id="compostsend" class="input-form" action="">
                    <p id="compostput">Please enter the new measurement:</p>

                    <input id="compost-input" class="input-measurement-area" type="number" name="compost-input">
                    <input class="form-submit-button" type="submit" value="Add">
                </form>

            </div>
        </li>

        <li class="flex-item">
            <!-- Widget 3 -->
            <div class="widget-container glass-widget">

                <div class="material-details">
                    <h1 class="material-name">Glass</h1>
                    <h2 id="glassup" class="material-measurement">18.9<span class="metric">kg</span></h2>
                </div>

                <button class="graphopen" value="glass">Graph</button>
                <button class="recordopen" value="glass">Records</button>

                <div class="add-button-style">
                    <button id="glass"><div class="button-value">+</div></button>
                </div>

            </div>

            <div class="add-info-container add-glass-info">

                <form id="glasssend" class="input-form" action="">
                    <p id="glassput">Please enter the new measurement:</p>
                    <input id="glass-input" class="input-measurement-area" type="number" name="glass-input">
                    <input class="form-submit-button" type="submit" value="Add">
                </form>

            </div>
        </li>

        <li class="flex-item">
            <!-- Widget 4 -->
            <div class="widget-container metal-widget">

                <div class="material-details">
                    <h1 class="material-name">Metal</h1>
                    <h2 id="metalup" class="material-measurement">4.6<span class="metric">kg</span></h2>
                </div>

                <button class="graphopen" value="metal">Graph</button>
                <button class="recordopen" value="metal">Records</button>

                <div class="add-button-style">
                    <button id="metal"><div class="button-value">+</div></button>
                </div>

            </div>

            <div class="add-info-container add-metal-info">

                <form id="metalsend" class="input-form" action="">
                    <p id="metalput">Please enter the new measurement:</p>
                    <input id="metal-input" class="input-measurement-area" type="number" name="metal-input">
                    <input class="form-submit-button" type="submit" value="Add">
                </form>

            </div>
        </li>

        <li class="flex-item">
            <!-- Widget 5 -->
            <div class="widget-container plastic-widget">

                <div class="material-details">
                    <h1 class="material-name">Plastic</h1>
                    <h2 id="plasticup" class="material-measurement">17.2<span class="metric">kg</span></h2>
                </div>

                <button class="graphopen" value="plastic">Graph</button>
                <button class="recordopen" value="plastic">Records</button>

                <div class="add-button-style">
                    <button id="plastic"><div class="button-value">+</div></button>
                </div>

            </div>

            <div class="add-info-container add-plastic-info">

                <form id="plasticsend" class="input-form" action="">
                    <p id="plasticput">Please enter the new measurement:</p>
                    <input id="plastic-input" class="input-measurement-area" type="number" name="plastic-input">
                    <input class="form-submit-button" type="submit" value="Add">
                </form>

            </div>
        </li>

        <!-- Widget 6 -->
        <li class="flex-item">
            <!-- Widget 3 -->
            <div class="widget-container general-widget">

                <div class="material-details">
                    <h1 class="material-name">General</h1>
                    <h2 id="generalup" class="material-measurement">10.3<span class="metric">kg</span></h2>
                </div>

                <button class="graphopen" value="general">Graph</button>
                <button class="recordopen" value="general">Records</button>

                <div class="add-button-style">
                    <button id="general"><div class="button-value">+</div></button>
                </div>

            </div>

            <div class="add-info-container add-general-info">

                <form id="generalsend" class="input-form" action="">
                    <p id="generalput">Please enter the new measurement:</p>
                    <input id="general-input" class="input-measurement-area" type="number" name="general-input">
                    <input class="form-submit-button" type="submit" value="Add">
                </form>

            </div>

        <!--Widget 7 - Calendar -->
        <li class="flex-item">
            <div class="main calander-widget">
                <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=150&amp;wkst=2&amp;bgcolor=%2366ff99&amp;src=greenkeeletest%40gmail.com&amp;color=%231B887A&amp;ctz=Europe%2FLondon"
                    style="border-width:0" width="300" height="150" frameborder="0" scrolling="no"></iframe>
            </div>
        </li>

        <!-- Widget 8 - Twitter -->
        <li class="flex-item">
            <a class="twitter-timeline" data-width="300" data-height="300" data-link-color="#19CF86" href="https://twitter.com/StudentSusHouse">Tweets by StudentSusHouse</a>
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </li>

        <!-- Widget 9 - Twitter Share -->
        <li class="flex-item">
            <div class="main share-widget">

                <div class="metric">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-text="See how much we recycled at:" data-hashtags="livegreen" data-show-count="false">Tweet</a>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <p></p>
                    <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-mobile-iframe="true">
                        <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a>
                    </div>
                </div>
            </div>
        </li>

        <!-- Widget 9 - Unkown -->
        <li class="flex-item">
            <div id="graphput">
                <form id="yearsel">
                    <select id="yearsal" name="year">
            </select>
                </form>
                <canvas id="myChart">
			</canvas>
            </div>
        </li>

        <!-- Widget 10 - Unkown -->
        <li class="flex-item">
            <div class="recordput">

            </div>
        </li>

        <!-- Widget 11 - Unkown -->
        <li class="flex-item">
            <div class="recordput">
            </div>
        </li>

    </li>
    </ul>

    <footer>
        <div>
            <img src="../src/img/keele-logo.png" alt="Keele Logo">
        </div>
        <div>
            <img src="../src/img/think-green.png" alt="Think Green">
        </div>
        <div class="icon-reference">Icon made by <a target="_blank" href="http://www.freepik.com" title="Freepik">Freepik</a> from <a target="_blank" href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by
            <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
        </div>
    </footer>

    <div id="fb-root"></div>

    <script src="../src/js/script2.js"></script>
    <script src="../src/js/widget.js"></script>
</body>

</html>

<?php include('header.php') ?>
    <style>
        .perfume__container {
            position: relative;
            width: 200px; /* Adjust the width of the container */
            margin: 20rem 30vh; /* Center the container */
        }
        
        .perfume__thumb {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center; /* Updated to center vertically */
            width: 100%;
            height: 300px; /* Adjust the height of the container */
        }
        
        .perfume__thumb img {
            max-width: 100%;
            height: auto;
            z-index: 1;
        }
        
        #perfume {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #8f79c2;
            width: 70%;
            margin-bottom: 75px;
            height: 0;
            transition: height 0.3s ease;
            /*clip-path: ellipse(100% 60% at 50% 40%);*/
            z-index: 2;
        }
        
        #addPerfumeBtn {
            text-align: center;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #8f79c2;
            color: white;
            cursor: pointer;
        }
        
        h2 {
            margin-top: 86vh;
        }
    </style>
</head>
<body>

    <section>
    <div class="container" style="margin-top: 15rem;">
            <h2 class="Text font-weight-bolde">Customize</h2>
            <hr>
        </div>
    <div class="perfume__container">
        <div class="perfume__thumb">
            <img src="assets/imgs/perfume-bottle.png" id="perfumebottle" alt="perfume" />
            <div id="perfume"></div>
        </div>
        <div id="addPerfumeBtn">Add Perfume</div>
    </div>
    </section>

    <script>
        document.getElementById("addPerfumeBtn").addEventListener("click", function () {
            var perfumeDiv = document.getElementById("perfume");
            var currentHeight = perfumeDiv.style.height ? parseFloat(perfumeDiv.style.height) : 0;

            if (currentHeight < 55) {
                var newHeight = currentHeight + 15;
                newHeight = newHeight > 55 ? 55 : newHeight;
                perfumeDiv.style.height = newHeight + "%";
            }
        });
    </script>
</body>
</html>

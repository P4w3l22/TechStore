    </div>
        <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
        <script src="../script/cl_checker.js"></script>
        <script src="../script/scripts.js"></script>
        <script>
            // CATEGORY
            document.getElementById('category').addEventListener('change', function() {
                var options = document.querySelectorAll('.dis')
                options.forEach(function(option) {
                    option.style.display = 'none'
                })
                var choice = document.getElementById('category').value
                document.getElementById(choice).style.display = 'block'
            })

            var options = document.querySelectorAll('.dis')
            options.forEach(function(option) {
                option.style.display = 'none'
            })
            var choice = document.getElementById('category').value
            document.getElementById(choice).style.display = 'block'


            // ADDPRODUCT EDIT
            

            var cat = "<?php echo $cat; ?>"
            console.log(cat)
            
            
            // $('#category').on('change', function() {
            //     $('.dis').hide();
            //     $('#' + $('#category').val()).show();
            // });

        </script>
        <script>
            var elements = document.querySelectorAll('ul.navbar-nav li.cat_choice')
            var contents = document.querySelectorAll('.dis')
            // var contents = $('.dis');

            elements.forEach(function (element, id) {
                element.addEventListener('click', function() {
                    elements.forEach(function (el) {
                        el.style.borderBottom = "none"
                    })
                    contents.forEach(function (content) {
                        content.style.display = 'none'  
                    })
                    contents[id].style.display = 'flex'
                    element.style.borderBottom = "2px solid blueviolet"
                })
            })

            // $('li').find('cat_choice').on('click', function() {
            //     $('li').find('cat_choice').css('border-bottom', 'none');
            //     $('.dis').hide();

            // });

        </script>
    </body>
</html>
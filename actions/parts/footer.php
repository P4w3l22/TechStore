    </div>
        <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
        <script src=../script/edit.js></script>
        <script src="../script/prod_checker.js"></script>
        <script src="../script/script.js"></script>
        <script>
            document.getElementById('category').addEventListener('change', function() {
                var options = document.querySelectorAll('.dis')
                options.forEach(function(option) {
                    option.style.display = 'none';
                })

                var choice = this.value;

                document.getElementById(choice).style.display = 'block'

            })
        </script>
    </body>
</html>
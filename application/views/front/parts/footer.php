
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; 2018 Your Company

                    - <a rel="nofollow" href="http://www.templatemo.com/tm-513-avalon" target="_parent">Avalon</a>
                    by <a rel="nofollow" href="http://www.html5max.com" target="_parent">HTML5 Max</a></p>
            </div>
        </div>
    </div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url()?>assets/front/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="<?php echo base_url()?>assets/front/js/vendor/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/front/js/datepicker.js"></script>
<script src="<?php echo base_url()?>assets/front/js/plugins.js"></script>
<script src="<?php echo base_url()?>assets/front/js/main.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        // navigation click actions
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
</script>
</body>
</html>
<style type="text/css">body {background-color:#ffffff;background-image:url(https://image.ibb.co/hr8MJe/imageedit_3_9971429985.png);background-repeat:no-repeat;background-position:center center;background-attachment:fixed;}
</style>
<p><img alt="logo_alligned" border="0" height="90" src="https://image.ibb.co/jQCH8p/logo_alligned.jpg" style="display: block; margin-left: auto; margin-right: auto;" width="606" /><span style="font-size:9px;">Copyright &copy; 2018 NAISSE Hall of Knowledge, USIM<br />
Disclaimer : This website has been updated to the best of our knowledge to be accurate. However, Universiti Sains Islam Malaysia shall not be liable for any loss or damage caused by the usage of any information obtained from this web site. For technical inquiries / comment about this website, contact :- naisse.hall@gmail.com </span></p>

<script  src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

<script type="text/javascript">
    var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };

    var keywords = [
        <?php if(isset($keywords) && count($keywords)>0){ $c=count($keywords); $i=0; foreach($keywords as $k){ $i++; ?>
        <?php echo '"'.$k.'"'; ?>
        <?php if($i<$c){echo ",";} ?>
        <?php }} ?>
    ];

    $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 0
        },
        {
            name: 'keywords',
            source: substringMatcher(keywords)
        });
</script>
<!-- new -->

<script type="text/javascript" src="{{ asset('public/frontend/js/tagcanvas.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {   if( ! $('#myCanvas').tagcanvas({     textColour : '#000000',     outlineThickness : 1,     maxSpeed : 0.03,     depth : 0.75   })) {     // TagCanvas failed to load
        $('#myCanvasContainer').hide();   }
        // your other jQuery stuff here...
        $('#myCanvasContainer').hide();
    });
    function showCanvas(){   $('#myCanvasContainer').show('slow');   }

    $('#btn-pack').on('click',function(e){
        e.preventDefault();
        $('#myModalx').modal('show');
    });
</script></body></html>
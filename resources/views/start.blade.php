<!DOCTYPE html>
<html>
<head>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #FFEFBA;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #FFFFFF, #FFEFBA);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #FFFFFF, #FFEFBA);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        .container {
            max-width: 640px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
        }

        ul.ks-cboxtags {
            list-style: none;
            padding: 20px;
        }
        ul.ks-cboxtags li{
            display: inline;
        }
        ul.ks-cboxtags li label{
            display: inline-block;
            background-color: rgba(255, 255, 255, .9);
            border: 2px solid rgba(139, 139, 139, .3);
            color: #adadad;
            border-radius: 25px;
            white-space: nowrap;
            margin: 3px 0px;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
            transition: all .2s;
        }

        ul.ks-cboxtags li label {
            padding: 8px 12px;
            cursor: pointer;
        }

        ul.ks-cboxtags li label::before {
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            font-size: 12px;
            padding: 2px 6px 2px 2px;
            content: "\f067";
            transition: transform .3s ease-in-out;
        }

        ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
            content: "\f00c";
            transform: rotate(-360deg);
            transition: transform .3s ease-in-out;
        }

        ul.ks-cboxtags li input[type="checkbox"]:checked + label {
            border: 2px solid #1bdbf8;
            background-color: #12bbd4;
            color: #fff;
            transition: all .2s;
        }

        ul.ks-cboxtags li input[type="checkbox"] {
            display: absolute;
        }
        ul.ks-cboxtags li input[type="checkbox"] {
            position: absolute;
            opacity: 0;
        }
        ul.ks-cboxtags li input[type="checkbox"]:focus + label {
            border: 2px solid #e9a1ff;
        }
    </style>

</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<div>
    <h3>Fruits</h3>
    <label>
        <input type="checkbox" class="radio" value="1" name="fooby[1][]" />Kiwi</label>
    <label>
        <input type="checkbox" class="radio" value="1" name="fooby[1][]" />Jackfruit</label>
    <label>
        <input type="checkbox" class="radio" value="1" name="fooby[1][]" />Mango</label>
</div>
<div>
    <h3>Animals</h3>
    <label>
        <input type="checkbox" class="radio" value="1" name="fooby[2][]" />Tiger</label>
    <label>
        <input type="checkbox" class="radio" value="1" name="fooby[2][]" />Sloth</label>
    <label>
        <input type="checkbox" class="radio" value="1" name="fooby[2][]" />Cheetah</label>
</div>
</body>
<script>
    $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });
</script>
</html>



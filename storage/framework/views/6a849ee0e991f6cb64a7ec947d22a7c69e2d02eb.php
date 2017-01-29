<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link rel="stylesheet" href="/css/pace.css">
    <script src="/js/pace.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/airbrake-js/0.5.9/client.min.js"></script>
    <script>
        window.airbrake = new airbrakeJs.Client({projectId: 134161, projectKey: '3a6426b8b17a0c75adcb5283a480ae8d'});
        window.onerror = window.airbrake.onerror;
    </script>
	
	<script>
	if (typeof Object.assign != 'function') {
  Object.assign = function (target, varArgs) { // .length of function is 2
    'use strict';
    if (target == null) { // TypeError if undefined or null
      throw new TypeError('Cannot convert undefined or null to object');
    }

    var to = Object(target);

    for (var index = 1; index < arguments.length; index++) {
      var nextSource = arguments[index];

      if (nextSource != null) { // Skip over if undefined or null
        for (var nextKey in nextSource) {
          // Avoid bugs when hasOwnProperty is shadowed
          if (Object.prototype.hasOwnProperty.call(nextSource, nextKey)) {
            to[nextKey] = nextSource[nextKey];
          }
        }
      }
    }
    return to;
  };
}
	</script>

    <!-- start Mixpanel -->
    <script type="text/javascript">
        !function (a, b) {
            if (!b.__SV) {
                var c = window;
                try {
                    var d, e, f, g = c.location, h = g.hash;
                    d = function (a, b) {
                        return (e = a.match(RegExp(b + "=([^&]*)"))) ? e[1] : null
                    }, h && d(h, "state") && (f = JSON.parse(decodeURIComponent(d(h, "state"))), "mpeditor" === f.action && (c.sessionStorage.setItem("_mpcehash", h), history.replaceState(f.desiredHash || "", a.title, g.pathname + g.search)))
                } catch (a) {
                }
                var i, j;
                window.mixpanel = b, b._i = [], b.init = function (a, c, d) {
                    function e(a, b) {
                        var c = b.split(".");
                        2 == c.length && (a = a[c[0]], b = c[1]), a[b] = function () {
                            a.push([b].concat(Array.prototype.slice.call(arguments, 0)))
                        }
                    }

                    var f = b;
                    for ("undefined" != typeof d ? f = b[d] = [] : d = "mixpanel", f.people = f.people || [], f.toString = function (a) {
                        var b = "mixpanel";
                        return "mixpanel" !== d && (b += "." + d), a || (b += " (stub)"), b
                    }, f.people.toString = function () {
                        return f.toString(1) + ".people (stub)"
                    }, i = "disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config reset people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" "), j = 0; j < i.length; j++)e(f, i[j]);
                    b._i.push([a, c, d])
                }, b.__SV = 1.2, c = a.createElement("script"), c.type = "text/javascript", c.async = !0, c.src = "undefined" != typeof MIXPANEL_CUSTOM_LIB_URL ? MIXPANEL_CUSTOM_LIB_URL : "file:" === a.location.protocol && "//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//) ? "https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js" : "//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js", d = a.getElementsByTagName("script")[0], d.parentNode.insertBefore(c, d)
            }
        }(document, window.mixpanel || []);
        if (typeof mixpanel !== 'undefined') {
            mixpanel.init("83e3c315733f7f831c82f1ef932120ab");
        }
    </script><!-- end Mixpanel -->


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" type="text/css">

<?php echo $__env->yieldContent('head'); ?>

<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <?php if(Auth::check()): ?>
                    <a href="<?php echo e(url('/logout')); ?>"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                <?php endif; ?>

                <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>
</div>

<!-- Scripts -->
<?php echo $__env->yieldContent('foot'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php if(Auth::check() or isset($email)): ?>
    <script>
        if (typeof mixpanel !== 'undefined') {
            mixpanel.identify('<?php echo e(Auth::check() ? Auth::user()->email : $email); ?>');
        }
    </script>
<?php endif; ?>
<script>
    if (typeof mixpanel !== 'undefined') {
        mixpanel.track('page view', {
            url: '<?php echo e(Request::route()->getName()); ?>'
        });
    }
</script>
</body>
</html>

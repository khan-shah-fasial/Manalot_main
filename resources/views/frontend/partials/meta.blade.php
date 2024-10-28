@php

$title = !empty(trim($__env->yieldContent('page.title'))) ? str_replace(['&nbsp;', '&amp;', '&amp;amp;'], ['&amp;', '&', '&'], htmlspecialchars_decode($__env->yieldContent('page.title'))) : 'Manalot Leadership Network';

$description = !empty(trim($__env->yieldContent('page.description'))) ? str_replace(['&nbsp;', '&amp;', '&amp;amp;'], ['&amp;', '&', '&'], htmlspecialchars_decode($__env->yieldContent('page.description'))) :
'Manalot Leadership Network';

$page_type = !empty(trim($__env->yieldContent('page.type'))) ? $__env->yieldContent('page.type') : 'website';

$publish_time = !empty(trim($__env->yieldContent('page.publish_time'))) ? $__env->yieldContent('page.publish_time') :
'2023-09-18T13:41:39+00:00';

$url = url()->current();

@endphp


<title>@php echo htmlspecialchars_decode($title) @endphp</title>
<meta charset="UTF-8" />
<meta name="robots" content="noindex">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Manalot">

<meta name="title" content="@php echo htmlspecialchars_decode($title) @endphp">
<meta name="description" content="@php echo htmlspecialchars_decode($description) @endphp">

<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
<meta property="og:url" content="{{ $url }}">
<meta property="og:type" content="{{ $page_type }}">
<meta property="og:site_name" content="{{ url('') }}">
<meta property="og:locale" content="en_US">

<meta property="og:title" content="@php echo htmlspecialchars_decode($title) @endphp">
<meta property="og:description" content="@php echo htmlspecialchars_decode($description) @endphp">




<!----------------- og tag ------------------->

<meta property="og:image" content="{{ asset('assets/images/namalot_logo.png') }}">
<meta property="og:image:width" content="500">
<meta property="og:image:height" content="500">
<meta property="og:image:type" content="image/png" />

<!----------------- og tag ------------------->

<!----------------- twitter ------------------->

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@php echo htmlspecialchars_decode($title) @endphp">
<meta name="twitter:description" content="@php echo htmlspecialchars_decode($title) @endphp">
<meta name="twitter:image" content="{{ asset('assets/images/namalot_logo.png') }}">
<meta name="twitter:site" content="@manalot" />

<!----------------- twitter ------------------->

<!----------------- canonical ------------------->

<link rel="canonical" href="{{ url()->current() }}">

<!----------------- canonical ------------------->

<!------------------- extra -------------------->

<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

<script
  src="https://kit.fontawesome.com/de10453c56.js"
  crossorigin="anonymous"
></script>

<!------------------- extra -------------------->

<!---------------- logo Schema ------------------->

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Manalot Leadership Network",
    "url": "{{ url('') }}/",
    "logo": "{{ asset('assets/images/namalot_logo.png') }}",
    "sameAs": [
      "https://www.facebook.com/manalot/",
      "https://twitter.com/manalot/",
      "https://www.linkedin.com/company/manalot"
    ]
  }
</script>
  
<!---------------- logo schema end --------------->

<!---------------- Contact Address Schema ------------------->

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LegalService",
    "name": "Manalot Leadership Network",
    "image": "{{ asset('assets/images/namalot_logo.png') }}",
    "@id": "",
    "url": "{{ url('') }}/",
    "telephone": "011-41023400",
    "address": [
      {
        "@type": "PostalAddress",
        "streetAddress": "Malhotra Chambers, 401, 4th Floor, Off. Govandi Station Road, Behind USV Ltd., Deonar, Chembur,",
        "addressLocality": "Mumbai",
        "postalCode": "400 088",
        "addressCountry": "IN"
      },
      {
        "@type": "PostalAddress",
        "streetAddress": "1660 N Lasalle, Dr Suite,",
        "addressLocality": "Chicago",
        "addressCountry": "US"
      }
    ]  
  }
</script>

@yield('page.schema')
  

<!---------------- Contact Address Schema end ------------------->



<base id="baseUrl" href="{{url('')}}">

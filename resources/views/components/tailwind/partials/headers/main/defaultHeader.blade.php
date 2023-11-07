@props([
    // title of the nav
    'title' => '',
    // should the nav be displayed with a shadow
    'has_shadow' => 'true',
    // for backward compatibility with Laravel 8
    'hasShadow' => 'true',
    // reduce padding within the nav
    'reduce_padding' => 'false',
    // for backward compatibility with Laravel 8
    'reducePadding' => 'false',
    // content to display as nav header
    'header' => '',
    // content to display as nav footer
    'footer' => '',
    // additional css
    'class' => '',
])

<nav id="navigation" class=" {{$class}}">
</nav>

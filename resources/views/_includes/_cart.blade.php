<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 11/06/2015
 * Time: 8:04 PM
 */
?>

<section class="row top-buffer-20"> <!-- Search Box and Shopping Cart-->
    <div class="pull-left"> <!-- Shopping Cart-->
        <a href="{{ $authCartCheck }}" class="btn btn-info btn-lg">
            <span class="glyphicon glyphicon-shopping-cart"></span>
            @if(isset($itemCount ))
                {{ $itemCount }}
            @endif
        </a>
    </div>
    <div class="pull-right"> <!-- Search Box -->
        <form>
            <input type="text" class="span7 search-query" name="Search" placeholder="Search">
            <button type="submit" class="add-on"><i class="glyphicon glyphicon-search"></i></button>
        </form>
    </div>

</section>
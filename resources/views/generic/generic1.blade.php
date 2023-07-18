<?php use Prismic\Dom\RichText; ?>

@extends('layout.default')

@section('sidebar')

    @if (isset($prismic->data->body2))
        
        <?php
            // dd($prismic);
            $slices = $prismic->data->body2;
            // dd($slices);
        ?>

        @foreach ($slices as $slice)
            
            @if($slice->slice_type == 'custom-include')
            
                @include('includes.slices.custom.'.$slice->primary->file)
            
            @elseif(\View::exists('includes.slices.'.$slice->slice_type))
            
                @include('includes.slices.'.$slice->slice_type)

            @else
                <p style="padding:20px; margin:20px 100px; color:#fff; font-size:30px; text-align:center; background-color:#ff0000;">Slice Missing:<br />"{{ $slice->slice_type }}"</p>
            @endif
        @endforeach
    
    @endif

@stop

@section('content')

    <?php
        // dd($prismic);
        $slices = $prismic->data->body1;
        // dd($slices);
    ?>
        
    @foreach ($slices as $slice)
        
        @if($slice->slice_type == 'custom-include')
        
            @include('includes.slices.custom.'.$slice->primary->file)
        
        @elseif(\View::exists('includes.slices.'.$slice->slice_type))
        
            @include('includes.slices.'.$slice->slice_type)

        @else
            <p style="padding:20px; margin:20px 100px; color:#fff; font-size:30px; text-align:center; background-color:#ff0000;">Slice Missing:<br />"{{ $slice->slice_type }}"</p>
        @endif
    @endforeach

@stop
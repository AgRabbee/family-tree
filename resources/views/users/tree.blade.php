@extends('layouts.user-profile-wide')

@section('subtitle', trans('app.family_tree'))

@section('user-content')
    <?php
    $spouseTotal = 0;
    $childsTotal = 0;
    $grandChildsTotal = 0;
    $ggTotal = 0;
    $ggcTotal = 0;
    $ggccTotal = 0;
    $udhegTotal = 0;
    ?>

{{--    {{ link_to_route('users.tree.export', 'Download', [$user->id], ['class' => 'btn btn-info']) }}--}}


    <div id="wrapper">
        <span class="label">{{ link_to_route('users.tree', !empty($user->yod) ? "Late ".$user->name : $user->name, [$user->id], ['title' => $user->name.' ('.$user->gender.')']) }}</span>
        @if ($spouseCount = $user->couples->count())
            <?php $spouseTotal += $spouseCount ?>
            <div class="branch spouselvl1">
                @foreach($user->couples as $couple)
                    <div class="entry {{ $spouseCount == 1 ? 'sole' : '' }}">
                        @php
                            $spouseName = !empty($couple->yod) ? "Late ".$couple->name : $couple->name;
                            $spouseName = "Spouse: $spouseName";
                        @endphp
                        <span class="label">
                            {{ link_to_route('users.tree', $spouseName, [$couple->id], ['title' => $couple->name.' ('.$couple->gender.')']) }}
                        </span>
                        @if ($childsCount = $user->childs->count())
                        <?php $childsTotal += $childsCount ?>
                            <div class="branch lv1">
                                @foreach($user->childs as $child)
                                    <div class="entry {{ $childsCount == 1 ? 'sole' : '' }}">
                                        <span class="label">
                                            {{ link_to_route('users.tree', $child->name, [$child->id], ['title' => $child->name.' ('.$child->gender.')']) }}
                                        </span>
                                        @if ($childSpouseCount = $child->couples->count())
                                            <div class="branch spouselvl2">
                                                @foreach($child->couples as $ccouple)
                                                    <div class="entry {{ $childSpouseCount == 1 ? 'sole' : '' }}">
                                                        @php
                                                            $cspouseName = !empty($ccouple->yod) ? "Late ".$ccouple->name : $ccouple->name;
                                                            $cspouseName = "Spouse: $cspouseName";
                                                        @endphp
                                                        <span class="label">{{ link_to_route('users.tree', $cspouseName, [$ccouple->id], ['title' => $ccouple->name.' ('.$ccouple->gender.')']) }}</span>
                                                        @if ($grandsCount = $child->childs->count())
                                                            <?php $grandChildsTotal += $grandsCount ?>
                                                            <div class="branch lv2">
                                                                @foreach($child->childs as $grand)
                                                                    <div class="entry {{ $grandsCount == 1 ? 'sole' : '' }}">
                                                                        <span class="label">
                                                                            {{ link_to_route('users.tree', $grand->name, [$grand->id], ['title' => $grand->name.' ('.$grand->gender.')']) }}
                                                                        </span>
                                                                        @if ($gcSpouseCount = $grand->couples->count())
                                                                            <div class="branch spouselvl3">
                                                                                @foreach($grand->couples as $gccouple)
                                                                                    <div class="entry {{ $gcSpouseCount == 1 ? 'sole' : '' }}">
                                                                                        @php
                                                                                            $gcspouseName = !empty($gccouple->yod) ? "Late ".$gccouple->name : $gccouple->name;
                                                                                            $gcspouseName = "Spouse: $gcspouseName";
                                                                                        @endphp
                                                                                        <span class="label">
                                                                                            {{ link_to_route('users.tree', $gcspouseName, [$gccouple->id], ['title' => $gccouple->name.' ('.$gccouple->gender.')']) }}
                                                                                        </span>
                                                                                        @if ($ggCount = $grand->childs->count())
                                                                                            <?php $ggTotal += $ggCount ?>
                                                                                            <div class="branch lv3">
                                                                                                @foreach($grand->childs as $gg)
                                                                                                    <div class="entry {{ $ggCount == 1 ? 'sole' : '' }}">
                                                                                                        <span class="label">
                                                                                                            {{ link_to_route('users.tree', $gg->name, [$gg->id], ['title' => $gg->name.' ('.$gg->gender.')']) }}
                                                                                                        </span>
                                                                                                        @if ($ggcSpouseCount = $gg->couples->count())
                                                                                                            <div class="branch spouselvl4">
                                                                                                                @foreach($gg->couples as $ggccouple)
                                                                                                                    <div class="entry {{ $ggcSpouseCount == 1 ? 'sole' : '' }}">
                                                                                                                        @php
                                                                                                                            $ggcspouseName = !empty($ggccouple->yod) ? "Late ".$ggccouple->name : $ggccouple->name;
                                                                                                                            $ggcspouseName = "Spouse: $ggcspouseName";
                                                                                                                        @endphp
                                                                                                                        <span class="label">
                                                                                                                            {{ link_to_route('users.tree', $ggcspouseName, [$ggccouple->id], ['title' => $ggccouple->name.' ('.$ggccouple->gender.')'])}}
                                                                                                                        </span>
                                                                                                                        @if ($ggcCount = $gg->childs->count())
                                                                                                                            <?php $ggcTotal += $ggcCount ?>
                                                                                                                            <div class="branch lv4">
                                                                                                                                @foreach($gg->childs as $ggc)
                                                                                                                                    <div class="entry {{ $ggcCount == 1 ? 'sole' : '' }}">
                                                                                                                                        <span class="label">
                                                                                                                                            {{ link_to_route('users.tree', $ggc->name, [$ggc->id], ['title' => $ggc->name.' ('.$ggc->gender.')']) }}
                                                                                                                                        </span>

                                                                                                                                        @if ($ggcspouseCount = $ggc->couples->count())
                                                                                                                                            <div class="branch spouselvl5">
                                                                                                                                                @foreach($ggc->couples as $ggccouple)
                                                                                                                                                    <div class="entry {{ $ggcspouseCount == 1 ? 'sole' : '' }}">
                                                                                                                                                        @php
                                                                                                                                                            $ggcspouseName = !empty($ggccouple->yod) ? "Late "
                                                                                                                                                            .$ggccouple->name : $ggccouple->name;
                                                                                                                                                            $ggcspouseName = "Spouse: $ggcspouseName";
                                                                                                                                                        @endphp
                                                                                                                                                        <span class="label">{{ link_to_route('users.tree',
                                                                                                                                                        $ggcspouseName, [$ggccouple->id], ['title' => $ggccouple->name.' ('.$ggccouple->gender.')']) }}
                                                                                                                                                        </span>
                                                                                                                                                        @if ($ggccCount = $ggc->childs->count())
                                                                                                                                                            <?php $ggccTotal += $ggccCount ?>
                                                                                                                                                            <div class="branch lv5">
                                                                                                                                                                @foreach($ggc->childs as $ggcc)
                                                                                                                                                                    <div class="entry {{ $ggccCount == 1 ? 'sole' : '' }}">
                                                                                                                                                                        <span class="label">{{ link_to_route('users.tree', $ggcc->name, [$ggcc->id], ['title' => $ggcc->name.' ('.$ggcc->gender.')']) }}</span>
                                                                                                                                                                        @if ($udhegCount = $ggcc->childs->count())
                                                                                                                                                                                <?php $udhegTotal += $udhegCount ?>
                                                                                                                                                                            <div class="branch lv6">
                                                                                                                                                                                @foreach($ggcc->childs as $udheg)
                                                                                                                                                                                    <div class="entry {{ $udhegCount == 1 ? 'sole' : '' }}">
                                                                                                                                                                                        <span class="label">{{ link_to_route('users.tree', $udheg->name, [$udheg->id], ['title' => $udheg->name.' ('.$udheg->gender.')']) }}</span>
                                                                                                                                                                                    </div>
                                                                                                                                                                                @endforeach
                                                                                                                                                                            </div>
                                                                                                                                                                        @endif
                                                                                                                                                                    </div>
                                                                                                                                                                @endforeach
                                                                                                                                                            </div>
                                                                                                                                                        @endif
                                                                                                                                                    </div>
                                                                                                                                                @endforeach
                                                                                                                                            </div>
                                                                                                                                        @endif
                                                                                                                                    </div>
                                                                                                                                @endforeach
                                                                                                                            </div>
                                                                                                                        @endif
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            </div>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                @endforeach
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="container">
        <hr>
        <div class="row">
            @if ($spouseTotal)
                <div class="col-md-1 text-right">{{ $user->gender_id == 1 ? trans('app.wife_count') : trans('app.husband_count') }}</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $spouseTotal }}</strong></div>
            @endif
            @if ($childsTotal)
                <div class="col-md-1 text-right">{{ trans('app.child_count') }}</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $childsTotal }}</strong></div>
            @endif
            @if ($grandChildsTotal)
                <div class="col-md-1 text-right">{{ trans('app.grand_child_count') }}</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $grandChildsTotal }}</strong></div>
            @endif
            @if ($ggTotal)
                <div class="col-md-1 text-right">Jumlah Cicit</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggTotal }}</strong></div>
            @endif
            @if ($ggcTotal)
                <div class="col-md-1 text-right">Jumlah Canggah</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggcTotal }}</strong></div>
            @endif
            @if ($ggccTotal)
                <div class="col-md-1 text-right">Jumlah Wareng</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggccTotal }}</strong></div>
            @endif
            @if ($udhegTotal)
                <div class="col-md-1 text-right">Jumlah Udheg2</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $udhegTotal }}</strong></div>
            @endif
        </div>
    </div>
@endsection

@section ('ext_css')
    <link rel="stylesheet" href="{{ asset('css/tree.css') }}">
@endsection

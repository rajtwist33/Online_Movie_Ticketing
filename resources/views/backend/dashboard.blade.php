@extends('backend.layouts.main')
@section('style')
@endsection
@section('body')
    @php
        $net_balance = $income + $deposit - ($expenditure + $withdraw);

        if ($income > 0) {
            $profit = $income - ($expenditure + $withdraw);
        } else {
            $profit = 0;
        }
    @endphp
    <div class="col-md-12">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                @if ($net_balance == 0)
                                    <h3 class="text-light">Rs. {{ abs($net_balance) }}
                                    </h3>
                                @elseif($net_balance > 0)
                                    <h3 class="text-light">Rs. {{ abs($net_balance) }} <i class="bi bi-arrow-up-circle"></i>
                                    </h3>
                                @else
                                    <h3 class="text-warning">Rs. 0</h3>
                                @endif
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">Net Balance</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $admin }}</h3>
                                <p>New User</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ $source }}</h3>

                                <p>Sources</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('source.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-md-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $executive }}</h3>

                                <p>Executive</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('executive.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>Rs. {{ $deposit }}</h3>
                                <p>Deposit</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('deposit.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Rs. {{ $income }}</h3>
                                <p>Income</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('income.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>Rs. {{ $expenditure }}</h3>
                                <p>Expenditure</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('expenditure.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>Rs. {{ $withdraw }}</h3>
                                <p>Withdraw</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('withdraw.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Rs. {{ $profit > 0 ? $profit : 0 }}
                                    @if ($profit > 0)
                                        <i class="bi bi-arrow-up-circle"></i>
                                    @endif
                                </h3>
                                <p>Profit</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href=#" class="small-box-footer">Profit <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>Rs. {{ $profit < 0 ? abs($profit) : 0 }}
                                    @if ($profit < 0)
                                        <i class="bi bi-arrow-down-circle"></i>
                                    @endif
                                </h3>
                                <p>Loss</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href=#" class="small-box-footer">Loss <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
@endsection

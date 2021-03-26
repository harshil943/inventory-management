<html>
    <head>
        <title>
            Challan - {{$challan->id}} | Bright Containers
        </title>
        <style>
            body {
                border:1px solid #b5babd;
                padding-left: 10px;
                padding-right: 10px;
                font-size:11px;
            }

            * {
                box-sizing: border-box;
            }

            .col-6 {
                float: left;
                width: 50%;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;

            }

        </style>
    </head>

<body>
    <div class="row">
        <div class="col-6" style="border-right:1px solid #b5babd;">
            Seller:
            <br>
            <strong style="font-size:20px;">{{$challan->seller->name}}</strong>
            <br>
            <strong>{{$challan->seller->head_office_address}}</strong>
            <table>
                <tr>
                    <td style="width:50%;">
                        State Code
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$challan->seller->state_code}}</strong>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;">
                        GST Number
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$challan->seller->gst_number}}</strong>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;">
                        PAN Number
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$challan->seller->pan_number}}</strong>
                    </td>
                </tr>
            </table>
            <hr style="color:#b5babd;">
            Buyer:
            <br>
            <strong style="font-size: 24px;">{{$challan->buyer->name}}</strong>
            <br>
            <strong>{{$challan->buyer->address}}</strong>
            <table>
                <tr>
                    <td style="width:50%;">
                        State Code
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$challan->buyer->state_code}}</strong>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;">
                        GST Number
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$challan->buyer->gst_number}}</strong>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-6">
            <table style="width:100%;">
                <tr>
                    <td colspan="2" style="text-align:right;">
                        <strong style="font-size: 24px;">
                            Challan No. - {{$challan->challan_id}}
                        </strong>
                        <hr style="color:#b5babd;">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;border-right:1px solid #b5babd;">
                        Buyer`s Order No.
                        <br>
                        <strong>{{$challan->order->buyer_order_number}}</strong>
                        <br><br>
                        Order Date
                        <br>
                            <strong>{{$challan->order_date}}</strong>
                        <br><br>
                        Despatch Through
                        <br>
                        @if ($challan->dispatch_method)
                        <strong>{{$challan->dispatch_method}}</strong>
                        @else
                        <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Total Packages
                        <br>
                        <strong>{{$challan->challan->total_no_packages}}</strong>
                    </td>
                    <td style="width:50%;">
                        Invoice No.
                        <br>
                        @if ($challan->challan)
                        <strong>{{$challan->challan->id}}</strong>
                        @else
                        <strong>Not Generated Yet</strong>
                        @endif
                        <br><br>
                        Shipping Date
                        <br>
                        @if ($challan->shipping_date)
                            <strong>{{$challan->shipping_date}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Motor Vehicle No
                        <br>
                        @if ($challan->vehical_number)
                            <strong>{{$challan->vehical_number}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <table style="width:100%;">
        <thead style="text-align:center;">
            <tr>
                <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                    Item List
                </th>
                <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                    Color
                </th>
                <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                    Bundle
                </th>
                <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                    Pack Size
                </th>
                <th style="border-top:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                    Sub Total
                </th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < sizeof($challan->challan->product_id); $i++)
                <tr style="text-align:right;">
                    <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;text-align:left;" rowspan="{{sizeof($challan->challan->color[$i]) + 1}}" >
                        <strong>{{$challan->challan->product_id[$i]}}</strong>
                    </td>
                    @php
                        $total = 0;
                    @endphp
                    @if ($challan->challan->is_cap[$i])
                        @for($j = 0; $j < sizeof($challan->challan->color[$i]); $j++)
                            @if ($j != 0)
                                <tr>
                            @endif
                            <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                <strong>{{$challan->challan->color[$i][$j]}}</strong>
                            </td>
                            <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                Avg - {{$challan->challan->bundle[$i][$j]}} GMS
                            </td>
                            <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                {{$challan->challan->pack_size[$i][$j]}} UNT
                            </td>
                            <td style="border-bottom:1px solid #b5babd;">
                                {{number_format((float)(($challan->challan->bundle[$i][$j] * $challan->challan->pack_size[$i][$j])/1000), 2, '.', '')}} KGS
                            </td>
                            @if ($j != 0)
                                </tr>
                            @endif
                            @php
                                $total += ($challan->challan->bundle[$i][$j] * $challan->challan->pack_size[$i][$j])/1000;
                            @endphp
                        @endfor
                        <tr style="text-align: right">
                            <td colspan="3" style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                <strong>Total :</strong>
                            </td>
                            <td style="border-bottom:1px solid #b5babd;">
                                <strong> {{number_format((float)($total), 2, '.', '')}} KGS</strong>
                            </td>
                        </tr>
                    @else
                        @for($j = 0; $j < sizeof($challan->challan->color[$i]); $j++)
                            @if ($j != 0)
                                <tr>
                            @endif
                            <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                <strong>{{$challan->challan->color[$i][$j]}}</strong>
                            </td>
                            <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                {{$challan->challan->bundle[$i][$j]}} BDL
                            </td>
                            <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                {{$challan->challan->pack_size[$i][$j]}} UNT
                            </td>
                            <td style="border-bottom:1px solid #b5babd;">
                                {{$challan->challan->bundle[$i][$j] * $challan->challan->pack_size[$i][$j]}} UNT
                            </td>
                            @if ($j != 0)
                                </tr>
                            @endif
                            @php
                                $total += $challan->challan->bundle[$i][$j] * $challan->challan->pack_size[$i][$j];
                            @endphp
                        @endfor
                        <tr style="text-align: right;">
                            <td colspan="3" style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                <strong>Total Weight:</strong>
                            </td>
                            <td style="border-bottom:1px solid #b5babd;">
                                <strong>{{$total}} UNT</strong>
                            </td>
                        </tr>
                    @endif
                </tr>
            @endfor
            <tr>
                <td colspan="5" style="border:none;">
                    <strong>E. & O.E</strong>
                </td>
            </tr>
        </tbody>
    </table>
    @if ($challan->challan->extra_note)
    <table style="text-align:right;width:100%;">
        <tr>
            <td style="width:30%;">
                <strong>Extra Note :</strong>
            </td>
            <td>
                {{$challan->challan->extra_note}}
                <hr style="color:#b5babd;">
            </td>
        </tr>
    </table>
    @endif
    <div class="row" style="padding: 10px;">
        <div class="col-6" style="border-right:1px solid #b5babd;">
            <br><br><br>
            <strong>
                Stamp & Signature <br>
                of {{$challan->buyer->name}},
            </strong>
        </div>
        <div class="col-6" style="text-align:right;">
            <br><br><br>
            <strong>
                Stamp & Signature <br>
                of {{$challan->seller->name}},
            </strong>
        </div>
    </div>
    <hr style="color:#b5babd;">
</body>
</html>

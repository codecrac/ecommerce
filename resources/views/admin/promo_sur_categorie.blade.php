@extends('admin.includes2')

@section('style_complementaire')
    <style>
        a {
            text-decoration: none;
            color: #fff;
        }
    </style>
@endsection

@section('body')
    <h3>Promotion sur categories</h3>

    {!! Session::get('message','') !!}

    <div class="row">
        <div class="offset-md-7 col-md-4">
            <form method="post" action="{{route('modifier_etat_toute_promo')}}" class="table table-bordered" style="border: 1px solid #ccc">
                <h4 class="text-center">Modifier etat de toute les promotions </h4>

                <div class="form-group p-1">
                    <select name="etat_toute_promotion" class="form-control">
                        <option value> Choisir... </option>
                        <option value="true"> Tout Activer </option>
                        <option value="false"> Tout Desactiver </option>
                    </select>
                </div>

                <h3 class="text-center">
                    @method('put')
                    @csrf
                    <button type="submit" class="btn btn-outline-warning"> Appliquer </button>
                </h3>
            </form>
        </div>
    </div>

    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>Categories</th>
            <th>Reduction (%) </th>
            <th>Statut promotion</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        @foreach($liste_menus_simple as $item_categorie)
            <tr>
                <form method="post" action="{{route('modifier_promotion_categorie',[$item_categorie['id']])}}">
                    <td class="table-user">
                        {{$item_categorie['titre']}}
                    </td>
                    <td>
                        <input name="reduction" class="form-control" type="number" value="{{$item_categorie['reduction']}}" min="0" max="100" step="1" required>
                    </td>
                    <td>
                        <select name="etat_promotion" class="form-control m-4">
                            <option value="{{$item_categorie['etat_promotion']}}"> {{ $item_categorie['etat_promotion'] =='true' ? 'Activer' : 'Desactiver' }} </option>
                            <option value="true"> Activer </option>
                            <option value="false"> Desactiver </option>
                        </select>
                    </td>
                    <td class="table-action">
                        @if( Auth::user()->modifier =='true' )
                            @method('put')
                            @csrf
                            <button type="submit" href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-check-bold"></i></button>
                        @endif
                    </td>
                </form>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection

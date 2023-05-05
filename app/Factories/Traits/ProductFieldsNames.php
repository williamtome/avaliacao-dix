<?php

namespace App\Factories\Traits;

use App\Models\BlingProduct;

trait ProductFieldsNames
{
    public static function get(BlingProduct $data): array
    {
        return [
            'codigo' => $data->code,
            'descricao' => $data->description,
            'descricaoCurta' => $data->short_description,
            'descricaoComplementar' => $data->complementar_description,
            'vlr_unit' => $data->price,
            'preco_custo' => $data->cost_price,
            'tipo' => $data->type,
            'situacao' => $data->situation,
            'un' => $data->unit,
            'estoque' => $data->quantity,
            'estoqueMinimo' => $data->minimum_stock,
            'estoqueMaximo' => $data->maximum_stock,
            'urlVideo' => $data->url_video,
            'marca' => $data->brand,
            'class_fiscal' => $data->class_fiscal,
            'cest' => $data->cest,
            'origem' => $data->origin,
            'idGrupoProduto' => $data->group_product_id,
            'linkExterno' => $data->external_link,
            'observacoes' => $data->observations,
            'garantia' => $data->guarantees,
            'pesoLiq' => $data->net_weight,
            'pesoBruto' => $data->gross_weight,
            'gtin' => $data->gtin,
            'gtinEmbalagem' => $data->gtin_package,
            'larguraProduto' => $data->product_weight,
            'alturaProduto' => $data->product_height,
            'profundidadeProduto' => $data->product_depth,
            'unidadeMedida' => $data->unit_of_measurement,
            'itensPorCaixa' => $data->items_per_box,
            'volumes' => $data->volumes,
            'localizacao' => $data->location,
            'crossdocking' => $data->crossdocking,
            'condicao' => $data->condition,
            'freteGratis' => $data->free_shipping,
            'producao' => $data->production,
            'dataValidade' => $data->expiration_date,
            'spedTipoItem' => $data->sped,
        ];
    }
}

<?php

namespace App\Factories;

use App\Factories\Traits\ProductFieldsNames;
use App\Models\BlingProduct;
use Illuminate\Support\Arr;

class XmlFactory
{
    use ProductFieldsNames;

    public static function create(BlingProduct $data, string $xmlElement): string
    {
        $dataInXml = new \SimpleXMLElement($xmlElement);

        foreach (self::get($data) as $key => $value) {
            $dataInXml->addChild($key, $value);
        }

        if ($data->variations()->exists()) {
            $dataInXml = self::addChildren($data, $dataInXml);
        }

        header('Content-Type: application/xml');

        return $dataInXml->asXML();
    }

    public function update(BlingProduct $data, string $xmlElement): string
    {
        $dataInXml = new \SimpleXMLElement($xmlElement);

        $data =  Arr::except(self::get($data), ['codigo']);

        foreach ($data as $key => $value) {
            $dataInXml->addChild($key, $value);
        }

        header('Content-Type: application/xml');

        return $dataInXml->asXML();
    }

    public static function updateQuantity(BlingProduct $data, string $xmlElement): string
    {
        $dataInXml = new \SimpleXMLElement($xmlElement);

        $dataInXml->addChild('estoque', $data->quantity);

        header('Content-Type: application/xml');

        return $dataInXml->asXML();
    }

    public static function addChildren(BlingProduct $data, \SimpleXMLElement $xml): \SimpleXMLElement
    {
        $variationsXml = $xml->addChild('variacoes');

        $data->variations->each(function ($variation) use ($variationsXml, $data) {
            $variationXml = $variationsXml->addChild('variacao');
            $variationXml->addChild('nome', $variation->name);
            $variationXml->addChild('codigo', $variation->code);
            $variationXml->addChild('clonarDadosPai', $data->clone_father_data);
        });

        return $xml;
    }
}

<?php
/**
 * Copyright (c) 2020 - Leonardo Scapinello
 * • @leoscapinello at @ristocucina
 *
 *
 *
 */

class Products
{

    private $id_product;
    private $id_category;
    private $id_season;
    private $product_description;
    private $product_weight;
    private $product_price;
    private $is_traditional;


    /**
     * Products constructor.
     * @param $id_product
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getIdProduct()
    {
        return $this->id_product;
    }

    /**
     * @return mixed
     */
    public function getIdCategory()
    {
        return $this->id_category;
    }

    /**
     * @return mixed
     */
    public function getIdSeason()
    {
        return $this->id_season;
    }

    /**
     * @return mixed
     */
    public function getProductDescription()
    {
        return $this->product_description;
    }

    /**
     * @return mixed
     */
    public function getProductWeight()
    {
        return $this->product_weight;
    }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->product_price;
    }

    /**
     * @return mixed
     */
    public function getIsTraditional()
    {
        return $this->is_traditional;
    }

    public function getAvaiableProductList($id_category = 0)
    {
        global $database;
        global $number;
        try {
            $category_filter = "";


            if ($number->isIdentity($id_category)) {
                $category_filter = "AND pr.id_category = " . $id_category;
            } else if (is_array($id_category)) {
                $itens_in = "";
                foreach ($id_category as $key) {
                    $itens_in .= $key . ",";
                }
                $category_filter = "AND pr.id_category IN (" . substr($itens_in, 0, -1) . ")";
            }

            $database->query("SELECT pr.id_product, pr.product_name, pr.product_description, pr.product_weight, pr.product_price, pr.is_traditional, pr.id_category, pc.category_name, pc.subcategory_name, po.product_offer_price, po.start_date AS offer_start, po.end_date AS offer_end, ps.start_date AS season_start, ps.end_date AS season_end FROM products pr LEFT JOIN products_categories pc ON pc.id_category = pr.id_category LEFT JOIN (SELECT id_offer, id_product, product_price AS product_offer_price, start_date, end_date FROM products_offers WHERE NOW() > start_date AND (NOW() < end_date OR end_date IS NULL) AND is_active = 'Y') po ON po.id_product = pr.id_product LEFT JOIN (SELECT id_season, season_name, start_date, end_date FROM products_season) ps ON ps.id_season = pr.id_season WHERE ( (NOW() > ps.start_date AND (NOW() < ps.end_date OR ps.end_date IS NULL)) OR pr.id_season IS NULL ) AND pc.is_active = 'Y' " . $category_filter);
            $resultSet = $database->resultset();
            if (count($resultSet) > 0) {
                return $resultSet;
            }
        } catch (Exception $exception) {
        }
        return array();
    }

    public function getProductURLById($id_product)
    {
        global $database;
        global $text;
        global $number;
        try {
            $database->query("SELECT pr.product_name, pr.product_weight, pc.category_name, pc.subcategory_name FROM products pr LEFT JOIN products_categories pc ON pc.id_category = pr.id_category WHERE pr.id_product = ?");
            $database->bind(1, $id_product);
            $resultSet = $database->resultset();
            if (count($resultSet) > 0) {
                $pattern = PRODUCT_URL_PATTERN;
                $product_name = $resultSet[0]['product_name'] . " " . $number->weight($resultSet[0]['product_weight']);
                $product_category = $resultSet[0]['category_name'];
                $product_subcategory = $resultSet[0]['subcategory_name'];
                $slug = $text->replaceSpecialCharacters($product_name);
                $category = $text->replaceSpecialCharacters($product_category);
                $subcategory = $text->replaceSpecialCharacters($product_subcategory);
                $pattern = str_replace("{id}", $id_product, $pattern);
                $pattern = str_replace("{product_category}", $category, $pattern);
                $pattern = str_replace("{product_subcategory}", $subcategory, $pattern);
                $pattern = str_replace("{product_name}", $slug, $pattern);
                $pattern = $text->removeSpace($pattern);
                $pattern = $text->lowecase($pattern);
                return $pattern;
            }
        } catch (Exception $exception) {
            echo $exception;
        }
        return null;
    }


}
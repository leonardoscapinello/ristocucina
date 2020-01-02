<section>
    <div class="section bg white">
        <div class="container">
            <div class="row">
                <div class="offset-3"></div>
                <div class="col col-sm-12 col-lg-6 col-xl-6">
                    <div class="text space center">
                        <h5 class="section-subtitle">TRADICIONAIS DE BATATA</h5>
                        <h2 class="section-title">Gnocchi Di Patate</h2>
                        <p class="section-subline">Massas tradicionais feitos com batata <b>de verdade</b> e
                            receita centenária tornam nosso
                            <i>Gnocchi</i> leve, saboroso e muito delicado ao paladar.</p>
                    </div>
                </div>
                <div class="offset-3"></div>
            </div>

            <div class="product-list horizontal-space">
                <div class="row">
                    <div class="col col-sm-12 col-lg-6 col-xl-6 gnc60">

                        <?php
                        $gnocchi_list = $products->getAvaiableProductList(1);
                        for ($i = 0; $i < count($gnocchi_list); $i++) {
                            $product_link = $products->getProductURLById($gnocchi_list[$i]['id_product']);
                            ?>
                            <div class="product-item">
                                <div class="product-detail name">
                                    <?= $text->utf8($gnocchi_list[$i]['product_name']) ?>
                                    <?= $number->weight($gnocchi_list[$i]['product_weight']) ?>

                                    <?php if ($gnocchi_list[$i]['is_traditional'] === "Y") { ?>
                                        <span class="stamp traditional"></span>
                                    <?php } ?>

                                </div>
                                <div class="product-detail price">
                                    <?php if ($number->biggerZero($gnocchi_list[$i]['product_offer_price'])) { ?>
                                        <span class="stroke">$ <?= $number->noDecimal($gnocchi_list[$i]['product_price']) ?></span>
                                        <span><strong>$ <?= $number->noDecimal($gnocchi_list[$i]['product_offer_price']) ?></strong></span>
                                    <?php } else { ?>
                                        <span><strong>$ <?= $number->noDecimal($gnocchi_list[$i]['product_price']) ?></strong></span>
                                    <?php } ?>
                                </div>
                                <div class="product-detail description">
                                    <?= $text->utf8($gnocchi_list[$i]['product_description']) ?>
                                </div>
                                <div class="product-detail action">
                                    <button class="btn">Comprar</button>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                    <div class="col col-sm-12 col-lg-6 col-xl-6">
                        <figure class="rounded">
                            <img src="<?=IMAGES?>nhoque-ao-sugo-no-prato-branco-sob-uma-mesa-de-madeira.png"
                                 alt="Gnocchi ao sugo no prato branco" class="rounded">
                            <figcaption>
                                Gnocchi de Batata RISTO® ao molho sugo coberto por queijo parmesão
                                ralado e manjericão.
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
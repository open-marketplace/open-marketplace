<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin/_partial/channels' => [[['_route' => 'sylius_admin_partial_channel_index', '_controller' => 'sylius.controller.channel:indexAction', '_sylius' => ['repository' => ['method' => 'findAll'], 'template' => '$template', 'permission' => true]], null, ['GET' => 0], null, true, false, null]],
        '/admin/_partial/taxons/tree' => [[['_route' => 'sylius_admin_partial_taxon_tree', '_controller' => 'sylius.controller.taxon:indexAction', '_sylius' => ['template' => '$template', 'repository' => ['method' => 'findRootNodes'], 'permission' => true]], null, ['GET' => 0], null, false, false, null]],
        '/admin/ajax/taxons/root-nodes' => [[['_route' => 'sylius_admin_ajax_taxon_root_nodes', '_controller' => 'sylius.controller.taxon:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Autocomplete'], 'permission' => true, 'repository' => ['method' => 'findRootNodes']]], null, ['GET' => 0], null, false, false, null]],
        '/admin/ajax/taxons/leafs' => [[['_route' => 'sylius_admin_ajax_taxon_leafs', '_controller' => 'sylius.controller.taxon:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Autocomplete'], 'permission' => true, 'repository' => ['method' => 'findChildren', 'arguments' => ['parentCode' => '$parentCode']]]], null, ['GET' => 0], null, false, false, null]],
        '/admin/ajax/taxons/leaf' => [[['_route' => 'sylius_admin_ajax_taxon_by_code', '_controller' => 'sylius.controller.taxon:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Autocomplete'], 'permission' => true, 'repository' => ['method' => 'findBy', 'arguments' => [['code' => '$code']]]]], null, ['GET' => 0], null, false, false, null]],
        '/admin/ajax/taxons/search' => [[['_route' => 'sylius_admin_ajax_taxon_by_name_phrase', '_controller' => 'sylius.controller.taxon:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Autocomplete'], 'permission' => true, 'repository' => ['method' => 'findByNamePart', 'arguments' => ['phrase' => 'expr:service(\'request_stack\').getCurrentRequest().query.get(\'phrase\', \'\')', 'locale' => null, 'limit' => 25]]]], null, ['GET' => 0], null, false, false, null]],
        '/admin/ajax/taxons/generate-slug' => [[['_route' => 'sylius_admin_ajax_generate_taxon_slug', '_controller' => 'sylius.controller.taxon_slug:generateAction', '_format' => 'json'], null, ['GET' => 0], null, true, false, null]],
        '/admin/ajax/products/generate-slug' => [[['_route' => 'sylius_admin_ajax_generate_product_slug', '_controller' => 'sylius.controller.product_slug:generateAction', '_format' => 'json'], null, ['GET' => 0], null, true, false, null]],
        '/admin/ajax/products/search' => [[['_route' => 'sylius_admin_ajax_product_by_name_phrase', '_controller' => 'sylius.controller.product:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Autocomplete'], 'permission' => true, 'repository' => ['method' => 'findByNamePart', 'arguments' => ['phrase' => '$phrase', 'locale' => 'expr:service(\'sylius.context.locale\').getLocaleCode()', 'limit' => 25]]]], null, ['GET' => 0], null, false, false, null]],
        '/admin/ajax/products/code' => [[['_route' => 'sylius_admin_ajax_product_by_code', '_controller' => 'sylius.controller.product:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Autocomplete'], 'permission' => true, 'repository' => ['method' => 'findBy', 'arguments' => [['code' => '$code']]]]], null, ['GET' => 0], null, false, false, null]],
        '/admin/ajax/products' => [[['_route' => 'sylius_admin_ajax_product_index', '_controller' => 'sylius.controller.product:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Default'], 'permission' => true, 'grid' => 'sylius_admin_product']], null, ['GET' => 0], null, true, false, null]],
        '/admin/ajax/product-taxons/update' => [[['_route' => 'sylius_admin_ajax_product_taxons_update_position', '_controller' => 'sylius.controller.product_taxon:updatePositionsAction', '_format' => 'json', '_sylius' => ['permission' => true]], null, ['PUT' => 0], null, false, false, null]],
        '/admin/ajax/product-variants/update' => [[['_route' => 'sylius_admin_ajax_product_variants_update_position', '_controller' => 'sylius.controller.product_variant:updatePositionsAction', '_format' => 'json', '_sylius' => ['permission' => true]], null, ['PUT' => 0], null, false, false, null]],
        '/admin/ajax/product-variants/search' => [[['_route' => 'sylius_admin_ajax_product_variants_by_phrase', '_controller' => 'sylius.controller.product_variant:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Autocomplete'], 'permission' => true, 'repository' => ['method' => 'findByPhraseAndProductCode', 'arguments' => ['phrase' => '$phrase', 'locale' => 'expr:service(\'sylius.context.locale\').getLocaleCode()', 'productCode' => '$productCode']]]], null, ['GET' => 0], null, false, false, null]],
        '/admin/ajax/product-variants/search-all' => [[['_route' => 'sylius_admin_ajax_all_product_variants_by_phrase', '_controller' => 'sylius.controller.product_variant:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Autocomplete'], 'permission' => true, 'repository' => ['method' => 'findByPhrase', 'arguments' => ['phrase' => '$phrase', 'locale' => 'expr:service(\'sylius.context.locale\').getLocaleCode()', 'limit' => '!!int 25']]]], null, ['GET' => 0], null, false, false, null]],
        '/admin/ajax/product-variants' => [[['_route' => 'sylius_admin_ajax_product_variants_by_codes', '_controller' => 'sylius.controller.product_variant:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Autocomplete'], 'permission' => true, 'repository' => ['method' => 'findByCodesAndProductCode', 'arguments' => ['$code', '$productCode']]]], null, ['GET' => 0], null, true, false, null]],
        '/admin/ajax/product-variants/all' => [[['_route' => 'sylius_admin_ajax_all_product_variants_by_codes', '_controller' => 'sylius.controller.product_variant:indexAction', '_format' => 'json', '_sylius' => ['serialization_groups' => ['Autocomplete'], 'permission' => true, 'repository' => ['method' => 'findByCodes', 'arguments' => ['$code']]]], null, ['GET' => 0], null, false, false, null]],
        '/admin/ajax/render-province-form' => [[['_route' => 'sylius_admin_ajax_render_province_form', '_controller' => 'sylius.controller.province:choiceOrTextFieldFormAction', '_sylius' => ['template' => '@SyliusAdmin/Common/Form/_province.html.twig']], null, null, null, false, false, null]],
        '/admin/ajax/get-version' => [[['_route' => 'sylius_admin_ajax_get_version', '_controller' => 'sylius.controller.admin.notification:getVersionAction', '_format' => 'json'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'sylius_admin_dashboard', '_controller' => 'sylius.controller.admin.dashboard:indexAction'], null, null, null, true, false, null]],
        '/admin/statistics' => [[['_route' => 'sylius_admin_dashboard_statistics', '_controller' => 'sylius.controller.admin.dashboard:getRawData'], null, null, null, false, false, null]],
        '/admin/users' => [[['_route' => 'sylius_admin_admin_user_index', '_controller' => 'sylius.controller.admin_user:indexAction', '_sylius' => ['grid' => 'sylius_admin_admin_user', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_users_able_to_access_administration_panel', 'templates' => ['form' => '@SyliusAdmin/AdminUser/_form.html.twig'], 'icon' => 'lock']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/users/new' => [[['_route' => 'sylius_admin_admin_user_create', '_controller' => 'sylius.controller.admin_user:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_admin_user_index', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_users_able_to_access_administration_panel', 'templates' => ['form' => '@SyliusAdmin/AdminUser/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/users/bulk-delete' => [[['_route' => 'sylius_admin_admin_user_bulk_delete', '_controller' => 'sylius.controller.admin_user:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_users_able_to_access_administration_panel', 'templates' => ['form' => '@SyliusAdmin/AdminUser/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/catalog-promotions' => [[['_route' => 'sylius_admin_catalog_promotion_index', '_controller' => 'sylius.controller.catalog_promotion:indexAction', '_sylius' => ['grid' => 'sylius_admin_catalog_promotion', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_discounts_on_product_catalog', 'templates' => ['form' => '@SyliusAdmin/CatalogPromotion/_form.html.twig'], 'icon' => 'bookmark']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/catalog-promotions/new' => [[['_route' => 'sylius_admin_catalog_promotion_create', '_controller' => 'sylius.controller.catalog_promotion:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_catalog_promotion_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_discounts_on_product_catalog', 'templates' => ['form' => '@SyliusAdmin/CatalogPromotion/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/channels' => [[['_route' => 'sylius_admin_channel_index', '_controller' => 'sylius.controller.channel:indexAction', '_sylius' => ['grid' => 'sylius_admin_channel', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.configure_channels_available_in_your_store', 'templates' => ['form' => '@SyliusAdmin/Channel/_form.html.twig'], 'icon' => 'share alternate']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/channels/new' => [[['_route' => 'sylius_admin_channel_create', '_controller' => 'sylius.controller.channel:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_channel_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.configure_channels_available_in_your_store', 'templates' => ['form' => '@SyliusAdmin/Channel/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/channels/bulk-delete' => [[['_route' => 'sylius_admin_channel_bulk_delete', '_controller' => 'sylius.controller.channel:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.configure_channels_available_in_your_store', 'templates' => ['form' => '@SyliusAdmin/Channel/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/countries' => [[['_route' => 'sylius_admin_country_index', '_controller' => 'sylius.controller.country:indexAction', '_sylius' => ['grid' => 'sylius_admin_country', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_destinations', 'templates' => ['form' => '@SyliusAdmin/Country/_form.html.twig'], 'icon' => 'flag']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/countries/new' => [[['_route' => 'sylius_admin_country_create', '_controller' => 'sylius.controller.country:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_country_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_destinations', 'templates' => ['form' => '@SyliusAdmin/Country/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/countries/bulk-delete' => [[['_route' => 'sylius_admin_country_bulk_delete', '_controller' => 'sylius.controller.country:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_destinations', 'templates' => ['form' => '@SyliusAdmin/Country/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/currencies' => [[['_route' => 'sylius_admin_currency_index', '_controller' => 'sylius.controller.currency:indexAction', '_sylius' => ['grid' => 'sylius_admin_currency', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_currencies_available_in_the_store', 'templates' => ['form' => '@SyliusAdmin/Currency/_form.html.twig'], 'icon' => 'dollar']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/currencies/new' => [[['_route' => 'sylius_admin_currency_create', '_controller' => 'sylius.controller.currency:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_currency_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_currencies_available_in_the_store', 'templates' => ['form' => '@SyliusAdmin/Currency/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/currencies/bulk-delete' => [[['_route' => 'sylius_admin_currency_bulk_delete', '_controller' => 'sylius.controller.currency:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_currencies_available_in_the_store', 'templates' => ['form' => '@SyliusAdmin/Currency/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/customers' => [[['_route' => 'sylius_admin_customer_index', '_controller' => 'sylius.controller.customer:indexAction', '_sylius' => ['grid' => 'sylius_admin_customer', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_your_customers', 'templates' => ['form' => '@SyliusAdmin/Customer/_form.html.twig'], 'icon' => 'users']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/customers/new' => [[['_route' => 'sylius_admin_customer_create', '_controller' => 'sylius.controller.customer:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_customer_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_your_customers', 'templates' => ['form' => '@SyliusAdmin/Customer/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/customers/bulk-delete' => [[['_route' => 'sylius_admin_customer_bulk_delete', '_controller' => 'sylius.controller.customer:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_your_customers', 'templates' => ['form' => '@SyliusAdmin/Customer/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/orders-statistics' => [[['_route' => 'sylius_admin_customer_orders_statistics', '_controller' => 'sylius.controller.customer_statistics:renderAction', '_sylius' => ['section' => 'admin', 'permission' => true]], null, ['GET' => 0], null, false, false, null]],
        '/admin/customer-groups' => [[['_route' => 'sylius_admin_customer_group_index', '_controller' => 'sylius.controller.customer_group:indexAction', '_sylius' => ['grid' => 'sylius_admin_customer_group', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['header' => 'sylius.ui.customer_groups', 'subheader' => 'sylius.ui.manage_customer_groups', 'templates' => ['form' => '@SyliusAdmin/CustomerGroup/_form.html.twig'], 'icon' => 'archive']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/customer-groups/new' => [[['_route' => 'sylius_admin_customer_group_create', '_controller' => 'sylius.controller.customer_group:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_customer_group_update', 'permission' => true, 'vars' => ['header' => 'sylius.ui.customer_groups', 'subheader' => 'sylius.ui.manage_customer_groups', 'templates' => ['form' => '@SyliusAdmin/CustomerGroup/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/customer-groups/bulk-delete' => [[['_route' => 'sylius_admin_customer_group_bulk_delete', '_controller' => 'sylius.controller.customer_group:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['header' => 'sylius.ui.customer_groups', 'subheader' => 'sylius.ui.manage_customer_groups', 'templates' => ['form' => '@SyliusAdmin/CustomerGroup/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/exchange-rates' => [[['_route' => 'sylius_admin_exchange_rate_index', '_controller' => 'sylius.controller.exchange_rate:indexAction', '_sylius' => ['grid' => 'sylius_admin_exchange_rate', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_exchange_rates', 'templates' => ['form' => '@SyliusAdmin/ExchangeRate/_form.html.twig'], 'icon' => 'sliders']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/exchange-rates/new' => [[['_route' => 'sylius_admin_exchange_rate_create', '_controller' => 'sylius.controller.exchange_rate:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_exchange_rate_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_exchange_rates', 'templates' => ['form' => '@SyliusAdmin/ExchangeRate/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/exchange-rates/bulk-delete' => [[['_route' => 'sylius_admin_exchange_rate_bulk_delete', '_controller' => 'sylius.controller.exchange_rate:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_exchange_rates', 'templates' => ['form' => '@SyliusAdmin/ExchangeRate/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/inventory' => [[['_route' => 'sylius_admin_inventory_index', '_controller' => 'sylius.controller.product_variant:indexAction', '_sylius' => ['template' => '@SyliusAdmin/Crud/index.html.twig', 'grid' => 'sylius_admin_inventory', 'section' => 'admin', 'permission' => true, 'vars' => ['icon' => 'history', 'templates' => ['breadcrumb' => '@SyliusAdmin/Inventory/Index/_breadcrumb.html.twig'], 'header' => 'sylius.ui.inventory', 'subheader' => 'sylius.ui.manage_inventory']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/locales' => [[['_route' => 'sylius_admin_locale_index', '_controller' => 'sylius.controller.locale:indexAction', '_sylius' => ['grid' => 'sylius_admin_locale', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_languages_available_in_the_store', 'templates' => ['form' => '@SyliusAdmin/Locale/_form.html.twig'], 'icon' => 'translate']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/locales/new' => [[['_route' => 'sylius_admin_locale_create', '_controller' => 'sylius.controller.locale:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_locale_index', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_languages_available_in_the_store', 'templates' => ['form' => '@SyliusAdmin/Locale/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/locales/bulk-delete' => [[['_route' => 'sylius_admin_locale_bulk_delete', '_controller' => 'sylius.controller.locale:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_languages_available_in_the_store', 'templates' => ['form' => '@SyliusAdmin/Locale/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/orders' => [[['_route' => 'sylius_admin_order_index', '_controller' => 'sylius.controller.order:indexAction', '_sylius' => ['grid' => 'sylius_admin_order', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.process_your_orders', 'icon' => 'cart']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/payments' => [[['_route' => 'sylius_admin_payment_index', '_controller' => 'sylius.controller.payment:indexAction', '_sylius' => ['grid' => 'sylius_admin_payment', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_payments', 'icon' => 'payment']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/payment-methods' => [[['_route' => 'sylius_admin_payment_method_index', '_controller' => 'sylius.controller.payment_method:indexAction', '_sylius' => ['grid' => 'sylius_admin_payment_method', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_payment_methods_available_to_your_customers', 'templates' => ['form' => '@SyliusAdmin/PaymentMethod/_form.html.twig'], 'icon' => 'payment']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/payment-methods/bulk-delete' => [[['_route' => 'sylius_admin_payment_method_bulk_delete', '_controller' => 'sylius.controller.payment_method:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_payment_methods_available_to_your_customers', 'templates' => ['form' => '@SyliusAdmin/PaymentMethod/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/payment-gateways' => [[['_route' => 'sylius_admin_get_payment_gateways', '_controller' => 'sylius.controller.payment_method:getPaymentGatewaysAction', 'template' => '@SyliusAdmin/PaymentMethod/Gateways/paymentGateways.html.twig'], null, ['GET' => 0], null, false, false, null]],
        '/admin/products/bulk-delete' => [[['_route' => 'sylius_admin_product_bulk_delete', '_controller' => 'sylius.controller.product:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_your_product_catalog', 'templates' => ['form' => '@SyliusAdmin/Product/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/products' => [[['_route' => 'sylius_admin_product_index', '_controller' => 'sylius.controller.product:indexAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'grid' => 'sylius_admin_product', 'template' => '@SyliusAdmin/Product/index.html.twig', 'vars' => ['subheader' => 'sylius.ui.manage_your_product_catalog', 'icon' => 'cube']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/products/new/simple' => [[['_route' => 'sylius_admin_product_create_simple', '_controller' => 'sylius.controller.product:createAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'factory' => ['method' => 'createWithVariant'], 'template' => '@SyliusAdmin/Crud/create.html.twig', 'redirect' => 'sylius_admin_product_update', 'vars' => ['subheader' => 'sylius.ui.manage_your_product_catalog', 'templates' => ['form' => '@SyliusAdmin/Product/_form.html.twig'], 'route' => ['name' => 'sylius_admin_product_create_simple']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/product-association-types' => [[['_route' => 'sylius_admin_product_association_type_index', '_controller' => 'sylius.controller.product_association_type:indexAction', '_sylius' => ['grid' => 'sylius_admin_product_association_type', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_association_types_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductAssociationType/_form.html.twig'], 'icon' => 'tasks']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/product-association-types/new' => [[['_route' => 'sylius_admin_product_association_type_create', '_controller' => 'sylius.controller.product_association_type:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_product_association_type_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_association_types_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductAssociationType/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/product-association-types/bulk-delete' => [[['_route' => 'sylius_admin_product_association_type_bulk_delete', '_controller' => 'sylius.controller.product_association_type:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_association_types_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductAssociationType/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/product-attributes' => [[['_route' => 'sylius_admin_product_attribute_index', '_controller' => 'sylius.controller.product_attribute:indexAction', '_sylius' => ['grid' => 'sylius_admin_product_attribute', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_attributes_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductAttribute/_form.html.twig'], 'icon' => 'cubes']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/product-attributes/bulk-delete' => [[['_route' => 'sylius_admin_product_attribute_bulk_delete', '_controller' => 'sylius.controller.product_attribute:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_attributes_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductAttribute/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/attribute-types' => [[['_route' => 'sylius_admin_get_attribute_types', '_controller' => 'sylius.controller.product_attribute:getAttributeTypesAction', 'template' => '@SyliusAdmin/ProductAttribute/Types/attributeTypes.html.twig'], null, ['GET' => 0], null, false, false, null]],
        '/admin/attributes' => [[['_route' => 'sylius_admin_get_product_attributes', '_controller' => 'sylius.controller.product_attribute:renderAttributesAction', 'template' => '@SyliusAdmin/Product/Attribute/attributeChoice.html.twig'], null, ['GET' => 0], null, false, false, null]],
        '/admin/attribute-forms' => [[['_route' => 'sylius_admin_render_attribute_forms', '_controller' => 'sylius.controller.product_attribute:renderAttributeValueFormsAction', 'template' => '@SyliusAdmin/Product/Attribute/attributeValues.html.twig'], null, ['GET' => 0], null, false, false, null]],
        '/admin/product-options' => [[['_route' => 'sylius_admin_product_option_index', '_controller' => 'sylius.controller.product_option:indexAction', '_sylius' => ['grid' => 'sylius_admin_product_option', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_configuration_options_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductOption/_form.html.twig'], 'icon' => 'options']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/product-options/new' => [[['_route' => 'sylius_admin_product_option_create', '_controller' => 'sylius.controller.product_option:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_product_option_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_configuration_options_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductOption/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/product-options/bulk-delete' => [[['_route' => 'sylius_admin_product_option_bulk_delete', '_controller' => 'sylius.controller.product_option:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_configuration_options_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductOption/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/product-reviews' => [[['_route' => 'sylius_admin_product_review_index', '_controller' => 'sylius.controller.product_review:indexAction', '_sylius' => ['grid' => 'sylius_admin_product_review', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_reviews_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductReview/_form.html.twig'], 'icon' => 'newspaper']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/product-reviews/bulk-delete' => [[['_route' => 'sylius_admin_product_review_bulk_delete', '_controller' => 'sylius.controller.product_review:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_reviews_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductReview/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/product-taxons/update' => [[['_route' => 'sylius_admin_product_taxons_update_position', '_controller' => 'sylius.controller.product_taxon:updateProductTaxonsPositionsAction'], null, ['PUT' => 0], null, false, false, null]],
        '/admin/promotions' => [[['_route' => 'sylius_admin_promotion_index', '_controller' => 'sylius.controller.promotion:indexAction', '_sylius' => ['grid' => 'sylius_admin_promotion', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_discounts_and_promotional_campaigns', 'templates' => ['form' => '@SyliusAdmin/Promotion/_form.html.twig'], 'icon' => 'in cart']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/promotions/new' => [[['_route' => 'sylius_admin_promotion_create', '_controller' => 'sylius.controller.promotion:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_promotion_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_discounts_and_promotional_campaigns', 'templates' => ['form' => '@SyliusAdmin/Promotion/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/promotions/bulk-delete' => [[['_route' => 'sylius_admin_promotion_bulk_delete', '_controller' => 'sylius.controller.promotion:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_discounts_and_promotional_campaigns', 'templates' => ['form' => '@SyliusAdmin/Promotion/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/login' => [[['_route' => 'sylius_admin_login', '_controller' => 'sylius.controller.security:loginAction', '_sylius' => ['template' => '@SyliusAdmin/Security/login.html.twig', 'permission' => true, 'logged_in_route' => 'sylius_admin_dashboard']], null, ['GET' => 0], null, false, false, null]],
        '/admin/login-check' => [[['_route' => 'sylius_admin_login_check', '_controller' => 'sylius.controller.security:checkAction'], null, ['POST' => 0], null, false, false, null]],
        '/admin/logout' => [[['_route' => 'sylius_admin_logout'], null, ['GET' => 0], null, false, false, null]],
        '/admin/shipments' => [[['_route' => 'sylius_admin_shipment_index', '_controller' => 'sylius.controller.shipment:indexAction', '_sylius' => ['grid' => 'sylius_admin_shipment', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipments', 'icon' => 'truck']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/shipping-categories' => [[['_route' => 'sylius_admin_shipping_category_index', '_controller' => 'sylius.controller.shipping_category:indexAction', '_sylius' => ['grid' => 'sylius_admin_shipping_category', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_categories_for_your_store', 'templates' => ['form' => '@SyliusAdmin/ShippingCategory/_form.html.twig'], 'icon' => 'list layout']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/shipping-categories/new' => [[['_route' => 'sylius_admin_shipping_category_create', '_controller' => 'sylius.controller.shipping_category:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_shipping_category_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_categories_for_your_store', 'templates' => ['form' => '@SyliusAdmin/ShippingCategory/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/shipping-categories/bulk-delete' => [[['_route' => 'sylius_admin_shipping_category_bulk_delete', '_controller' => 'sylius.controller.shipping_category:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_categories_for_your_store', 'templates' => ['form' => '@SyliusAdmin/ShippingCategory/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/shipping-methods' => [[['_route' => 'sylius_admin_shipping_method_index', '_controller' => 'sylius.controller.shipping_method:indexAction', '_sylius' => ['grid' => 'sylius_admin_shipping_method', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_methods_for_your_store', 'templates' => ['form' => '@SyliusAdmin/ShippingMethod/_form.html.twig'], 'icon' => 'shipping']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/shipping-methods/new' => [[['_route' => 'sylius_admin_shipping_method_create', '_controller' => 'sylius.controller.shipping_method:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_shipping_method_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_methods_for_your_store', 'templates' => ['form' => '@SyliusAdmin/ShippingMethod/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/shipping-methods/bulk-delete' => [[['_route' => 'sylius_admin_shipping_method_bulk_delete', '_controller' => 'sylius.controller.shipping_method:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_methods_for_your_store', 'templates' => ['form' => '@SyliusAdmin/ShippingMethod/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/taxons/new' => [[['_route' => 'sylius_admin_taxon_create', '_controller' => 'sylius.controller.taxon:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Taxon/create.html.twig', 'redirect' => 'sylius_admin_taxon_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_categorization_of_your_products', 'templates' => ['form' => '@SyliusAdmin/Taxon/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/taxons/bulk-delete' => [[['_route' => 'sylius_admin_taxon_bulk_delete', '_controller' => 'sylius.controller.taxon:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_categorization_of_your_products', 'templates' => ['form' => '@SyliusAdmin/Taxon/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/taxons' => [[['_route' => 'sylius_admin_taxon_index', '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController:redirectAction', 'route' => 'sylius_admin_taxon_create', 'permanent' => true], null, ['GET' => 0], null, true, false, null]],
        '/admin/tax-categories' => [[['_route' => 'sylius_admin_tax_category_index', '_controller' => 'sylius.controller.tax_category:indexAction', '_sylius' => ['grid' => 'sylius_admin_tax_category', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_taxation_of_your_products', 'templates' => ['form' => '@SyliusAdmin/TaxCategory/_form.html.twig'], 'icon' => 'tags']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/tax-categories/new' => [[['_route' => 'sylius_admin_tax_category_create', '_controller' => 'sylius.controller.tax_category:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_tax_category_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_taxation_of_your_products', 'templates' => ['form' => '@SyliusAdmin/TaxCategory/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/tax-categories/bulk-delete' => [[['_route' => 'sylius_admin_tax_category_bulk_delete', '_controller' => 'sylius.controller.tax_category:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_taxation_of_your_products', 'templates' => ['form' => '@SyliusAdmin/TaxCategory/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/tax-rates' => [[['_route' => 'sylius_admin_tax_rate_index', '_controller' => 'sylius.controller.tax_rate:indexAction', '_sylius' => ['grid' => 'sylius_admin_tax_rate', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_taxation_of_your_products', 'templates' => ['form' => '@SyliusAdmin/TaxRate/_form.html.twig'], 'icon' => 'money']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/tax-rates/new' => [[['_route' => 'sylius_admin_tax_rate_create', '_controller' => 'sylius.controller.tax_rate:createAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/create.html.twig', 'redirect' => 'sylius_admin_tax_rate_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_taxation_of_your_products', 'templates' => ['form' => '@SyliusAdmin/TaxRate/_form.html.twig']]]], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/tax-rates/bulk-delete' => [[['_route' => 'sylius_admin_tax_rate_bulk_delete', '_controller' => 'sylius.controller.tax_rate:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_taxation_of_your_products', 'templates' => ['form' => '@SyliusAdmin/TaxRate/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/admin/zones' => [[['_route' => 'sylius_admin_zone_index', '_controller' => 'sylius.controller.zone:indexAction', '_sylius' => ['grid' => 'sylius_admin_zone', 'section' => 'admin', 'template' => '@SyliusAdmin\\Crud/index.html.twig', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_geographical_zones', 'templates' => ['form' => '@SyliusAdmin/Zone/_form.html.twig'], 'icon' => 'world']]], null, ['GET' => 0], null, true, false, null]],
        '/admin/zones/bulk-delete' => [[['_route' => 'sylius_admin_zone_bulk_delete', '_controller' => 'sylius.controller.zone:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_geographical_zones', 'templates' => ['form' => '@SyliusAdmin/Zone/_form.html.twig']], 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], null, ['DELETE' => 0], null, false, false, null]],
        '/api/v2/shop/addresses' => [
            [['_route' => 'api_addresses_shop_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Address', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_addresses_shop_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Address', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/admin/catalog-promotions' => [
            [['_route' => 'api_catalog_promotions_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\CatalogPromotion', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_catalog_promotions_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\CatalogPromotion', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/admin/channels' => [
            [['_route' => 'api_channels_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Channel', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_channels_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Channel', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/admin/countries' => [
            [['_route' => 'api_countries_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Country', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_countries_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Country', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/shop/countries' => [[['_route' => 'api_countries_shop_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Country', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/admin/currencies' => [
            [['_route' => 'api_currencies_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Currency\\Model\\Currency', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_currencies_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Currency\\Model\\Currency', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/shop/currencies' => [[['_route' => 'api_currencies_shop_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Currency\\Model\\Currency', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/shop/customers' => [[['_route' => 'api_customers_shop_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Customer', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_post'], null, ['POST' => 0], null, false, false, null]],
        '/api/v2/admin/locales' => [
            [['_route' => 'api_locales_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Locale\\Model\\Locale', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_locales_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Locale\\Model\\Locale', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/shop/locales' => [[['_route' => 'api_locales_shop_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Locale\\Model\\Locale', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/admin/orders' => [[['_route' => 'api_orders_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/shop/orders' => [
            [['_route' => 'api_orders_shop_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_post'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'api_orders_shop_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_get'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/v2/admin/payments' => [[['_route' => 'api_payments_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Payment', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/admin/products' => [
            [['_route' => 'api_products_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Product', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_products_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Product', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/shop/products' => [[['_route' => 'api_products_shop_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Product', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/admin/product-images' => [[['_route' => 'api_product_images_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductImage', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/admin/product-options' => [
            [['_route' => 'api_product_options_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductOption', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_product_options_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductOption', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/admin/product-reviews' => [[['_route' => 'api_product_reviews_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductReview', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/shop/product-reviews' => [
            [['_route' => 'api_product_reviews_shop_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductReview', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_post'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'api_product_reviews_shop_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductReview', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_get'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/v2/admin/product-taxons' => [[['_route' => 'api_product_taxa_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductTaxon', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/admin/product-variants' => [
            [['_route' => 'api_product_variants_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductVariant', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_product_variants_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductVariant', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/shop/product-variants' => [[['_route' => 'api_product_variants_shop_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductVariant', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/shop/reset-password-requests' => [[['_route' => 'api_reset_password_requests_shop_create_reset_password_request_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Bundle\\ApiBundle\\Command\\Account\\ResetPassword', '_api_identifiers' => ['resetPasswordToken'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_create_reset_password_request'], null, ['POST' => 0], null, false, false, null]],
        '/api/v2/admin/shipments' => [[['_route' => 'api_shipments_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Shipment', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/admin/shipping-methods' => [
            [['_route' => 'api_shipping_methods_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShippingMethod', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_shipping_methods_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShippingMethod', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/admin/taxons' => [
            [['_route' => 'api_taxa_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Taxon', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_taxa_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Taxon', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v2/shop/taxons' => [[['_route' => 'api_taxa_shop_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Taxon', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/admin/taxon-translations' => [[['_route' => 'api_taxon_translations_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Taxonomy\\Model\\TaxonTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], null, ['GET' => 0], null, false, false, null]],
        '/api/v2/shop/account-verification-requests' => [[['_route' => 'api_verify_customer_accounts_shop_resend_verification_email_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Bundle\\ApiBundle\\Command\\Account\\VerifyCustomerAccount', '_api_identifiers' => ['token'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'shop_resend_verification_email'], null, ['POST' => 0], null, false, false, null]],
        '/api/v2/admin/authentication-token' => [[['_route' => 'sylius_api_admin_authentication_token'], null, ['POST' => 0], null, false, false, null]],
        '/api/v2/shop/authentication-token' => [[['_route' => 'sylius_api_shop_authentication_token'], null, ['POST' => 0], null, false, false, null]],
        '/payment/capture/session-token' => [[['_route' => 'payum_capture_do_session', '_controller' => 'Payum\\Bundle\\PayumBundle\\Controller\\CaptureController::doSessionTokenAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'sylius_shop_default_locale', '_controller' => 'sylius.controller.shop.locale_switch:switchAction'], null, ['GET' => 0], null, false, false, null]],
        '/.well-known/change-password' => [[['_route' => 'sylius_shop_request_password_reset_token_redirect', 'route' => 'sylius_shop_request_password_reset_token', 'permanent' => false, '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction'], null, ['GET' => 0], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/media/cache/resolve/(?'
                    .'|([A-z0-9_-]*)/rc/([^/]++)/(.+)(*:61)'
                    .'|([A-z0-9_-]*)/(.+)(*:86)'
                .')'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|_partial/(?'
                            .'|address/log\\-entry/([^/]++)(*:146)'
                            .'|customers/(?'
                                .'|latest/([^/]++)(*:182)'
                                .'|([^/]++)(*:198)'
                            .')'
                            .'|orders/(?'
                                .'|latest/([^/]++)(?'
                                    .'|(*:235)'
                                    .'|/([^/]++)(*:252)'
                                .')'
                                .'|([^/]++)/shipments/([^/]++)/ship(*:293)'
                            .')'
                            .'|pro(?'
                                .'|ducts/([^/]++)(*:322)'
                                .'|motions/([^/]++)(*:346)'
                            .')'
                            .'|taxons/([^/]++)(*:370)'
                        .')'
                        .'|ajax/taxons/([^/]++)/move(*:404)'
                        .'|impersonate(?:/([^/]++))?(*:437)'
                        .'|users/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:470)'
                                .'|remove\\-avatar(*:492)'
                            .')'
                            .'|(*:501)'
                        .')'
                        .'|c(?'
                            .'|atalog\\-promotions/([^/]++)(?'
                                .'|/edit(*:549)'
                                .'|(*:557)'
                            .')'
                            .'|hannels/([^/]++)(?'
                                .'|/edit(*:590)'
                                .'|(*:598)'
                            .')'
                            .'|ountries/([^/]++)/edit(*:629)'
                            .'|u(?'
                                .'|rrencies/([^/]++)/edit(*:663)'
                                .'|stomer(?'
                                    .'|s/([^/]++)(?'
                                        .'|/(?'
                                            .'|edit(*:701)'
                                            .'|orders(*:715)'
                                        .')'
                                        .'|(*:724)'
                                    .')'
                                    .'|\\-groups/([^/]++)(?'
                                        .'|/edit(*:758)'
                                        .'|(*:766)'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|exchange\\-rates/([^/]++)(?'
                            .'|/edit(*:810)'
                            .'|(*:818)'
                        .')'
                        .'|locales/([^/]++)/edit(*:848)'
                        .'|orders/([^/]++)(?'
                            .'|(*:874)'
                            .'|/(?'
                                .'|history(*:893)'
                                .'|edit(*:905)'
                                .'|cancel(*:919)'
                                .'|payments/([^/]++)/(?'
                                    .'|complete(*:956)'
                                    .'|refund(*:970)'
                                .')'
                            .')'
                        .')'
                        .'|([^/]++)/(?'
                            .'|ship(*:997)'
                            .'|resend\\-confirmation\\-email(*:1032)'
                        .')'
                        .'|p(?'
                            .'|ayment(?'
                                .'|s/([^/]++)/complete(*:1074)'
                                .'|\\-methods/(?'
                                    .'|([^/]++)(?'
                                        .'|/edit(*:1112)'
                                        .'|(*:1121)'
                                    .')'
                                    .'|new/([^/]++)(*:1143)'
                                .')'
                            .')'
                            .'|ro(?'
                                .'|duct(?'
                                    .'|s/(?'
                                        .'|([^/]++)(?'
                                            .'|(*:1182)'
                                            .'|/edit(*:1196)'
                                        .')'
                                        .'|taxon/([^/]++)(*:1220)'
                                        .'|new(*:1232)'
                                        .'|([^/]++)(?'
                                            .'|(*:1252)'
                                            .'|/variants(?'
                                                .'|(*:1273)'
                                                .'|/(?'
                                                    .'|new(*:1289)'
                                                    .'|([^/]++)/edit(*:1311)'
                                                    .'|bulk\\-delete(*:1332)'
                                                    .'|([^/]++)(*:1349)'
                                                    .'|generate(*:1366)'
                                                .')'
                                            .')'
                                        .')'
                                    .')'
                                    .'|\\-(?'
                                        .'|a(?'
                                            .'|ssociation\\-types/([^/]++)(?'
                                                .'|/edit(*:1422)'
                                                .'|(*:1431)'
                                            .')'
                                            .'|ttributes/([^/]++)(?'
                                                .'|/(?'
                                                    .'|edit(*:1470)'
                                                    .'|new(*:1482)'
                                                .')'
                                                .'|(*:1492)'
                                            .')'
                                        .')'
                                        .'|options/([^/]++)(?'
                                            .'|/edit(*:1527)'
                                            .'|(*:1536)'
                                        .')'
                                        .'|review(?'
                                            .'|s/([^/]++)(?'
                                                .'|/edit(*:1573)'
                                                .'|(*:1582)'
                                            .')'
                                            .'|/([^/]++)/(?'
                                                .'|accept(*:1611)'
                                                .'|reject(*:1626)'
                                            .')'
                                        .')'
                                    .')'
                                .')'
                                .'|motions/([^/]++)(?'
                                    .'|/(?'
                                        .'|edit(*:1666)'
                                        .'|coupons(?'
                                            .'|(*:1685)'
                                            .'|/(?'
                                                .'|new(*:1701)'
                                                .'|([^/]++)/edit(*:1723)'
                                                .'|generate(*:1740)'
                                                .'|bulk\\-delete(*:1761)'
                                                .'|([^/]++)(*:1778)'
                                            .')'
                                        .')'
                                    .')'
                                    .'|(*:1790)'
                                .')'
                            .')'
                        .')'
                        .'|sh(?'
                            .'|ip(?'
                                .'|ments/([^/]++)(?'
                                    .'|/(?'
                                        .'|ship(*:1837)'
                                        .'|resend\\-confirmation\\-email(*:1873)'
                                    .')'
                                    .'|(*:1883)'
                                .')'
                                .'|ping\\-(?'
                                    .'|categories/([^/]++)(?'
                                        .'|/edit(*:1929)'
                                        .'|(*:1938)'
                                    .')'
                                    .'|methods/([^/]++)(?'
                                        .'|/(?'
                                            .'|edit(*:1975)'
                                            .'|archive(*:1991)'
                                        .')'
                                        .'|(*:2001)'
                                    .')'
                                .')'
                            .')'
                            .'|op\\-user/([^/]++)(*:2030)'
                        .')'
                        .'|tax(?'
                            .'|ons/(?'
                                .'|([^/]++)(?'
                                    .'|/edit(*:2069)'
                                    .'|(*:2078)'
                                .')'
                                .'|new/([^/]++)(*:2100)'
                            .')'
                            .'|\\-(?'
                                .'|categories/([^/]++)(?'
                                    .'|/edit(*:2142)'
                                    .'|(*:2151)'
                                .')'
                                .'|rates/([^/]++)(?'
                                    .'|/edit(*:2183)'
                                    .'|(*:2192)'
                                .')'
                            .')'
                        .')'
                        .'|zones/(?'
                            .'|([^/]++)(?'
                                .'|/edit(*:2229)'
                                .'|(*:2238)'
                            .')'
                            .'|(country|province|zone)/new(*:2275)'
                        .')'
                    .')'
                    .'|pi/v2(?'
                        .'|(?:/(index)(?:\\.([^/]++))?)?(*:2322)'
                        .'|/(?'
                            .'|docs(?:\\.([^/]++))?(*:2354)'
                            .'|contexts/(.+)(?:\\.([^/]++))?(*:2391)'
                            .'|admin/(?'
                                .'|a(?'
                                    .'|d(?'
                                        .'|dresses/([^/]++)(*:2433)'
                                        .'|justments/([^/]++)(*:2460)'
                                        .'|ministrators(?'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:2502)'
                                            .')'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:2541)'
                                            .')'
                                        .')'
                                    .')'
                                    .'|vatar\\-images(?'
                                        .'|(?:\\.([^/]++))?(*:2584)'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:2622)'
                                        .')'
                                    .')'
                                .')'
                                .'|c(?'
                                    .'|atalog\\-promotion(?'
                                        .'|s/([^/]++)(?'
                                            .'|(*:2671)'
                                        .')'
                                        .'|\\-(?'
                                            .'|actions/([^/\\.]++)(?:\\.([^/]++))?(*:2719)'
                                            .'|scopes/([^/\\.]++)(?:\\.([^/]++))?(*:2760)'
                                            .'|translations/([^/]++)(*:2790)'
                                        .')'
                                    .')'
                                    .'|hannel(?'
                                        .'|s/([^/]++)(?'
                                            .'|(*:2823)'
                                            .'|/shop\\-billing\\-data(*:2852)'
                                        .')'
                                        .'|\\-pricings/([^/\\.]++)(?:\\.([^/]++))?(*:2898)'
                                    .')'
                                    .'|ountries/([^/]++)(?'
                                        .'|(*:2928)'
                                        .'|/provinces(*:2947)'
                                    .')'
                                    .'|u(?'
                                        .'|rrencies/([^/]++)(*:2978)'
                                        .'|stomer(?'
                                            .'|s/([^/]++)(*:3006)'
                                            .'|\\-groups(?'
                                                .'|(?:\\.([^/]++))?(?'
                                                    .'|(*:3044)'
                                                .')'
                                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                    .'|(*:3083)'
                                                .')'
                                            .')'
                                        .')'
                                    .')'
                                .')'
                                .'|exchange\\-rates(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:3133)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:3172)'
                                    .')'
                                .')'
                                .'|locales/([^/]++)(*:3199)'
                                .'|order(?'
                                    .'|s/([^/]++)(?'
                                        .'|(*:3229)'
                                        .'|/(?'
                                            .'|cancel(*:3248)'
                                            .'|payments(*:3265)'
                                            .'|shipments(*:3283)'
                                        .')'
                                    .')'
                                    .'|\\-item(?'
                                        .'|s/([^/]++)(?'
                                            .'|(*:3316)'
                                            .'|/adjustments(*:3337)'
                                        .')'
                                        .'|\\-units/([^/]++)(*:3363)'
                                    .')'
                                .')'
                                .'|p(?'
                                    .'|ayment(?'
                                        .'|s/([^/]++)(?'
                                            .'|(*:3400)'
                                            .'|/complete(*:3418)'
                                        .')'
                                        .'|\\-methods/([^/]++)(*:3446)'
                                    .')'
                                    .'|ro(?'
                                        .'|duct(?'
                                            .'|s/([^/]++)(?'
                                                .'|(*:3481)'
                                            .')'
                                            .'|\\-(?'
                                                .'|association\\-type(?'
                                                    .'|s(?'
                                                        .'|(?:\\.([^/]++))?(?'
                                                            .'|(*:3538)'
                                                        .')'
                                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                            .'|(*:3577)'
                                                        .')'
                                                    .')'
                                                    .'|\\-translations/([^/\\.]++)(?:\\.([^/]++))?(*:3628)'
                                                .')'
                                                .'|images/([^/]++)(*:3653)'
                                                .'|option(?'
                                                    .'|s/([^/]++)(?'
                                                        .'|(*:3684)'
                                                        .'|/values(*:3700)'
                                                    .')'
                                                    .'|\\-(?'
                                                        .'|translations/([^/\\.]++)(?:\\.([^/]++))?(*:3753)'
                                                        .'|values/([^/]++)(*:3777)'
                                                    .')'
                                                .')'
                                                .'|reviews/([^/]++)(?'
                                                    .'|(*:3807)'
                                                    .'|/(?'
                                                        .'|accept(*:3826)'
                                                        .'|reject(*:3841)'
                                                    .')'
                                                .')'
                                                .'|t(?'
                                                    .'|axons/([^/]++)(*:3870)'
                                                    .'|ranslations/([^/]++)(*:3899)'
                                                .')'
                                                .'|variant(?'
                                                    .'|s/([^/]++)(?'
                                                        .'|(*:3932)'
                                                    .')'
                                                    .'|\\-translation/([^/]++)(*:3964)'
                                                .')'
                                            .')'
                                        .')'
                                        .'|motions(?'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:4004)'
                                            .')'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:4043)'
                                            .')'
                                        .')'
                                        .'|vinces/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:4089)'
                                        .')'
                                    .')'
                                .')'
                                .'|sh(?'
                                    .'|ip(?'
                                        .'|ments/([^/]++)(?'
                                            .'|(*:4128)'
                                            .'|/ship(*:4142)'
                                        .')'
                                        .'|ping\\-(?'
                                            .'|categories(?'
                                                .'|(?:\\.([^/]++))?(?'
                                                    .'|(*:4192)'
                                                .')'
                                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                    .'|(*:4231)'
                                                .')'
                                            .')'
                                            .'|method(?'
                                                .'|s/([^/]++)(?'
                                                    .'|(*:4264)'
                                                    .'|/(?'
                                                        .'|archive(*:4284)'
                                                        .'|restore(*:4300)'
                                                    .')'
                                                .')'
                                                .'|\\-translations/([^/]++)(*:4334)'
                                            .')'
                                        .')'
                                    .')'
                                    .'|op\\-billing\\-datas/([^/\\.]++)(?:\\.([^/]++))?(*:4390)'
                                .')'
                                .'|tax(?'
                                    .'|\\-categories(?'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:4439)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:4478)'
                                        .')'
                                    .')'
                                    .'|on(?'
                                        .'|s/([^/]++)(?'
                                            .'|(*:4507)'
                                        .')'
                                        .'|\\-translations/([^/]++)(*:4540)'
                                    .')'
                                .')'
                                .'|zone(?'
                                    .'|s(?'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:4580)'
                                        .')'
                                        .'|/(?'
                                            .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:4622)'
                                            .')'
                                            .'|([^/]++)/members(?:\\.([^/]++))?(*:4663)'
                                        .')'
                                    .')'
                                    .'|\\-members/([^/\\.]++)(?:\\.([^/]++))?(*:4709)'
                                .')'
                            .')'
                            .'|shop/(?'
                                .'|a(?'
                                    .'|d(?'
                                        .'|dresses/([^/]++)(?'
                                            .'|(*:4755)'
                                        .')'
                                        .'|justments/([^/]++)(*:4783)'
                                    .')'
                                    .'|ccount(?'
                                        .'|/orders/([^/]++)/payments/([^/]++)(*:4836)'
                                        .'|\\-verification\\-requests/([^/]++)(*:4878)'
                                    .')'
                                .')'
                                .'|c(?'
                                    .'|atalog\\-promotions/([^/]++)(*:4920)'
                                    .'|hannels/([^/]++)(*:4945)'
                                    .'|ountries/([^/]++)(*:4971)'
                                    .'|u(?'
                                        .'|rrencies/([^/]++)(*:5001)'
                                        .'|stomers/([^/]++)(?'
                                            .'|(*:5029)'
                                            .'|/password(*:5047)'
                                            .'|(*:5056)'
                                        .')'
                                    .')'
                                .')'
                                .'|locales/([^/]++)(*:5084)'
                                .'|order(?'
                                    .'|s/([^/]++)(?'
                                        .'|(*:5114)'
                                        .'|/(?'
                                            .'|items(?'
                                                .'|(*:5135)'
                                                .'|/([^/]++)(?'
                                                    .'|(*:5156)'
                                                    .'|(*:5165)'
                                                    .'|/adjustments(*:5186)'
                                                .')'
                                                .'|(*:5196)'
                                            .')'
                                            .'|shipments/([^/]++)(?'
                                                .'|(*:5227)'
                                                .'|/methods(*:5244)'
                                            .')'
                                            .'|payments/([^/]++)(?'
                                                .'|(*:5274)'
                                                .'|/(?'
                                                    .'|configuration(*:5300)'
                                                    .'|methods(*:5316)'
                                                .')'
                                            .')'
                                            .'|complete(*:5335)'
                                            .'|adjustments(*:5355)'
                                        .')'
                                        .'|(*:5365)'
                                    .')'
                                    .'|\\-item(?'
                                        .'|s/([^/]++)(*:5394)'
                                        .'|\\-units/([^/]++)(*:5419)'
                                    .')'
                                .')'
                                .'|p(?'
                                    .'|ayment(?'
                                        .'|s/([^/]++)(?'
                                            .'|(*:5456)'
                                            .'|/methods(*:5473)'
                                        .')'
                                        .'|\\-methods/([^/]++)(*:5501)'
                                    .')'
                                    .'|roduct(?'
                                        .'|s(?'
                                            .'|/([^/]++)(*:5533)'
                                            .'|\\-by\\-slug/([^/]++)(*:5561)'
                                        .')'
                                        .'|\\-(?'
                                            .'|images/([^/]++)(*:5591)'
                                            .'|option(?'
                                                .'|s/([^/]++)(*:5619)'
                                                .'|\\-values/([^/]++)(*:5645)'
                                            .')'
                                            .'|reviews/([^/]++)(*:5671)'
                                            .'|t(?'
                                                .'|axons/([^/]++)(*:5698)'
                                                .'|ranslations/([^/]++)(*:5727)'
                                            .')'
                                            .'|variant(?'
                                                .'|s/([^/]++)(*:5757)'
                                                .'|\\-translation/([^/]++)(*:5788)'
                                            .')'
                                        .')'
                                    .')'
                                .')'
                                .'|reset\\-password\\-requests/([^/]++)(*:5835)'
                                .'|ship(?'
                                    .'|ments/([^/]++)(?'
                                        .'|(*:5868)'
                                        .'|/methods(*:5885)'
                                    .')'
                                    .'|ping\\-method(?'
                                        .'|s/([^/]++)(*:5920)'
                                        .'|\\-translations/([^/]++)(*:5952)'
                                    .')'
                                .')'
                                .'|taxon(?'
                                    .'|s/([^/]++)(*:5981)'
                                    .'|\\-translations/([^/]++)(*:6013)'
                                .')'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/ajax/users/check(*:6120)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/ajax/cart/add(*:6219)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/ajax/cart/([^/]++)/remove(*:6330)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/ajax/render\\-province\\-form(*:6443)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/_partial/taxons/by\\-slug/(.+)(*:6558)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/_partial/taxons/by\\-code/([^/]++)(*:6677)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/_partial/taxons/by\\-channel\\-menu\\-taxon(*:6803)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/_partial/cart/summary(*:6910)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/_partial/cart/add\\-item(*:7019)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/_partial/products/latest/([^/]++)(*:7138)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/_partial/products/([^/]++)(*:7250)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/_partial/products/([^/]++)/reviews/latest(?:/([^/]++))?(*:7391)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/_partial/products/([^/]++)/associations/([^/]++)(*:7525)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)(*:7610)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/login(*:7701)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/login\\-check(*:7799)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/logout(*:7891)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/register(*:7985)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/register\\-after\\-checkout/([^/]++)(*:8105)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/forgotten\\-password(*:8210)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/forgotten\\-password/([^/]++)(*:8324)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/verify(*:8416)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/verify/([^/]++)(*:8517)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/products/([^/]++)(*:8620)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/taxons/(.+(?<!/))(*:8723)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/products/([^/]++)/reviews(*:8834)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/products/([^/]++)/reviews/new(*:8949)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/cart(?'
                    .'|(*:9042)'
                .')'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/cart/([^/]++)/remove(*:9149)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/checkout(*:9243)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/checkout/address(*:9345)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/checkout/select\\-shipping(*:9456)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/checkout/select\\-payment(*:9566)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/checkout/complete(*:9669)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/contact(*:9762)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/order/thank\\-you(*:9864)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/order/([^/]++)/pay(*:9968)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/order/after\\-pay(*:10070)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/order/([^/]++)(*:10171)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account/orders(*:10272)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account/orders/([^/]++)(*:10382)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account/address\\-book(*:10490)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account/address\\-book/add(*:10602)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account/address\\-book/([^/]++)/edit(*:10724)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account/address\\-book/([^/]++)(*:10841)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account/address\\-book/([^/]++)/set\\-as\\-default(*:10975)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account(*:11069)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account/dashboard(*:11173)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account/profile/edit(*:11280)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/account/change\\-password(*:11391)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/switch\\-currency/([^/]++)(*:11503)'
                .'|/([A-Za-z]{2,4}(?:_(?:[A-Za-z]{4}|[0-9]{3}))?(?:_(?:[A-Za-z]{2}|[0-9]{3}))?)/switch\\-locale/([^/]++)(*:11613)'
                .'|/payment/(?'
                    .'|authorize/([^/]++)(*:11653)'
                    .'|capture/([^/]++)(*:11679)'
                    .'|notify/(?'
                        .'|unsafe/([^/]++)(*:11714)'
                        .'|([^/]++)(*:11732)'
                    .')'
                .')'
                .'|/_(?'
                    .'|wdt/([^/]++)(*:11761)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:11809)'
                            .'|router(*:11825)'
                            .'|exception(?'
                                .'|(*:11847)'
                                .'|\\.css(*:11862)'
                            .')'
                        .')'
                        .'|(*:11874)'
                    .')'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        61 => [[['_route' => 'liip_imagine_filter_runtime', '_controller' => 'Liip\\ImagineBundle\\Controller\\ImagineController::filterRuntimeAction'], ['filter', 'hash', 'path'], ['GET' => 0], null, false, true, null]],
        86 => [[['_route' => 'liip_imagine_filter', '_controller' => 'Liip\\ImagineBundle\\Controller\\ImagineController::filterAction'], ['filter', 'path'], ['GET' => 0], null, false, true, null]],
        146 => [[['_route' => 'sylius_admin_partial_address_log_entry_index', '_controller' => 'sylius.controller.address_log_entry:indexAction', '_sylius' => ['template' => '@SyliusUi/Grid/_history.html.twig', 'grid' => 'sylius_admin_address_log_entry', 'section' => 'admin', 'permission' => true]], ['id'], ['GET' => 0], null, false, true, null]],
        182 => [[['_route' => 'sylius_admin_partial_customer_latest', '_controller' => 'sylius.controller.customer:indexAction', '_sylius' => ['repository' => ['method' => 'findLatest', 'arguments' => ['!!int $count']], 'template' => '$template', 'permission' => true]], ['count'], ['GET' => 0], null, false, true, null]],
        198 => [[['_route' => 'sylius_admin_partial_customer_show', '_controller' => 'sylius.controller.customer:showAction', '_sylius' => ['template' => '$template', 'vars' => '$vars', 'permission' => true]], ['id'], ['GET' => 0], null, false, true, null]],
        235 => [[['_route' => 'sylius_admin_partial_order_latest', '_controller' => 'sylius.controller.order:indexAction', '_sylius' => ['repository' => ['method' => 'findLatest', 'arguments' => ['!!int $count']], 'template' => '$template', 'permission' => true]], ['count'], ['GET' => 0], null, false, true, null]],
        252 => [[['_route' => 'sylius_admin_partial_order_latest_in_channel', '_controller' => 'sylius.controller.order:indexAction', '_sylius' => ['repository' => ['method' => 'findLatestInChannel', 'arguments' => ['count' => '!!int $count', 'channel' => 'expr:notFoundOnNull(service(\'sylius.repository.channel\').findOneByCode($channelCode))']], 'template' => '$template', 'permission' => true]], ['channelCode', 'count'], ['GET' => 0], null, false, true, null]],
        293 => [[['_route' => 'sylius_admin_partial_shipment_ship', '_controller' => 'sylius.controller.shipment:updateAction', '_sylius' => ['event' => 'ship', 'repository' => ['method' => 'findOneByOrderId', 'arguments' => ['id' => '$id', 'orderId' => '$orderId']], 'state_machine' => ['graph' => 'sylius_shipment', 'transition' => 'ship'], 'section' => 'admin', 'permission' => true, 'template' => '@SyliusAdmin/Shipment/Partial/_ship.html.twig', 'form' => 'Sylius\\Bundle\\ShippingBundle\\Form\\Type\\ShipmentShipType', 'vars' => ['route' => ['parameters' => ['orderId' => '$orderId', 'id' => '$id']]]]], ['orderId', 'id'], ['GET' => 0], null, false, false, null]],
        322 => [[['_route' => 'sylius_admin_partial_product_show', '_controller' => 'sylius.controller.product:showAction', '_sylius' => ['template' => '$template', 'vars' => '$vars', 'permission' => true]], ['id'], ['GET' => 0], null, false, true, null]],
        346 => [[['_route' => 'sylius_admin_partial_promotion_show', '_controller' => 'sylius.controller.promotion:showAction', '_sylius' => ['template' => '$template', 'vars' => '$vars', 'permission' => true]], ['id'], ['GET' => 0], null, false, true, null]],
        370 => [[['_route' => 'sylius_admin_partial_taxon_show', '_controller' => 'sylius.controller.taxon:showAction', '_sylius' => ['template' => '$template', 'vars' => '$vars', 'permission' => true]], ['id'], ['GET' => 0], null, false, true, null]],
        404 => [[['_route' => 'sylius_admin_ajax_taxon_move', '_controller' => 'sylius.controller.taxon:updateAction', '_format' => 'json', '_sylius' => ['permission' => true, 'form' => 'Sylius\\Bundle\\TaxonomyBundle\\Form\\Type\\TaxonPositionType']], ['id'], ['PUT' => 0], null, false, false, null]],
        437 => [[['_route' => 'sylius_admin_impersonate_user', '_controller' => 'sylius.controller.impersonate_user:impersonateAction', 'username' => '$username'], ['username'], null, null, false, true, null]],
        470 => [[['_route' => 'sylius_admin_admin_user_update', '_controller' => 'sylius.controller.admin_user:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_admin_user_index', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_users_able_to_access_administration_panel', 'templates' => ['form' => '@SyliusAdmin/AdminUser/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        492 => [[['_route' => 'sylius_admin_admin_user_remove_avatar', '_controller' => 'Sylius\\Bundle\\AdminBundle\\Action\\RemoveAvatarAction'], ['id'], ['PUT' => 0], null, false, false, null]],
        501 => [[['_route' => 'sylius_admin_admin_user_delete', '_controller' => 'sylius.controller.admin_user:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_users_able_to_access_administration_panel', 'templates' => ['form' => '@SyliusAdmin/AdminUser/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        549 => [[['_route' => 'sylius_admin_catalog_promotion_update', '_controller' => 'sylius.controller.catalog_promotion:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_catalog_promotion_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_discounts_on_product_catalog', 'templates' => ['form' => '@SyliusAdmin/CatalogPromotion/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        557 => [[['_route' => 'sylius_admin_catalog_promotion_show', '_controller' => 'sylius.controller.catalog_promotion:showAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin/CatalogPromotion/show.html.twig', 'permission' => true]], ['id'], null, null, false, true, null]],
        590 => [[['_route' => 'sylius_admin_channel_update', '_controller' => 'sylius.controller.channel:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_channel_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.configure_channels_available_in_your_store', 'templates' => ['form' => '@SyliusAdmin/Channel/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        598 => [[['_route' => 'sylius_admin_channel_delete', '_controller' => 'sylius.controller.channel:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.configure_channels_available_in_your_store', 'templates' => ['form' => '@SyliusAdmin/Channel/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        629 => [[['_route' => 'sylius_admin_country_update', '_controller' => 'sylius.controller.country:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_country_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_destinations', 'templates' => ['form' => '@SyliusAdmin/Country/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        663 => [[['_route' => 'sylius_admin_currency_update', '_controller' => 'sylius.controller.currency:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_currency_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_currencies_available_in_the_store', 'templates' => ['form' => '@SyliusAdmin/Currency/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        701 => [[['_route' => 'sylius_admin_customer_update', '_controller' => 'sylius.controller.customer:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_customer_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_your_customers', 'templates' => ['form' => '@SyliusAdmin/Customer/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        715 => [[['_route' => 'sylius_admin_customer_order_index', '_controller' => 'sylius.controller.order:indexAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'template' => '@SyliusAdmin/Crud/index.html.twig', 'grid' => 'sylius_admin_customer_order', 'vars' => ['route' => ['parameters' => ['$customerId' => '$id']], 'templates' => ['breadcrumb' => '@SyliusAdmin/Customer/Order/Index/_breadcrumb.html.twig', 'header_title' => '@SyliusAdmin/Customer/Order/Index/_headerTitle.html.twig'], 'subheader' => 'sylius.ui.process_your_orders', 'icon' => 'cart']]], ['id'], ['GET' => 0], null, false, false, null]],
        724 => [[['_route' => 'sylius_admin_customer_show', '_controller' => 'sylius.controller.customer:showAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin/Customer/show.html.twig', 'permission' => true]], ['id'], null, null, false, true, null]],
        758 => [[['_route' => 'sylius_admin_customer_group_update', '_controller' => 'sylius.controller.customer_group:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_customer_group_update', 'permission' => true, 'vars' => ['header' => 'sylius.ui.customer_groups', 'subheader' => 'sylius.ui.manage_customer_groups', 'templates' => ['form' => '@SyliusAdmin/CustomerGroup/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        766 => [[['_route' => 'sylius_admin_customer_group_delete', '_controller' => 'sylius.controller.customer_group:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['header' => 'sylius.ui.customer_groups', 'subheader' => 'sylius.ui.manage_customer_groups', 'templates' => ['form' => '@SyliusAdmin/CustomerGroup/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        810 => [[['_route' => 'sylius_admin_exchange_rate_update', '_controller' => 'sylius.controller.exchange_rate:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_exchange_rate_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_exchange_rates', 'templates' => ['form' => '@SyliusAdmin/ExchangeRate/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        818 => [[['_route' => 'sylius_admin_exchange_rate_delete', '_controller' => 'sylius.controller.exchange_rate:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_exchange_rates', 'templates' => ['form' => '@SyliusAdmin/ExchangeRate/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        848 => [[['_route' => 'sylius_admin_locale_update', '_controller' => 'sylius.controller.locale:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_locale_index', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_languages_available_in_the_store', 'templates' => ['form' => '@SyliusAdmin/Locale/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        874 => [[['_route' => 'sylius_admin_order_show', '_controller' => 'sylius.controller.order:showAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'template' => '@SyliusAdmin/Order/show.html.twig']], ['id'], ['GET' => 0], null, false, true, null]],
        893 => [[['_route' => 'sylius_admin_order_history', '_controller' => 'sylius.controller.order:showAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'template' => '@SyliusAdmin/Order/history.html.twig']], ['id'], ['GET' => 0], null, false, false, null]],
        905 => [[['_route' => 'sylius_admin_order_update', '_controller' => 'sylius.controller.order:updateAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'template' => '@SyliusAdmin/Order/update.html.twig', 'form' => ['options' => ['validation_groups' => ['sylius_shipping_address_update']]]]], ['id'], ['GET' => 0, 'PUT' => 1], null, false, false, null]],
        919 => [[['_route' => 'sylius_admin_order_cancel', '_controller' => 'sylius.controller.order:applyStateMachineTransitionAction', '_sylius' => ['permission' => true, 'state_machine' => ['graph' => 'sylius_order', 'transition' => 'cancel'], 'redirect' => 'referer']], ['id'], ['PUT' => 0], null, false, false, null]],
        956 => [[['_route' => 'sylius_admin_order_payment_complete', '_controller' => 'sylius.controller.payment:applyStateMachineTransitionAction', '_sylius' => ['event' => 'complete', 'permission' => true, 'repository' => ['method' => 'findOneByOrderId', 'arguments' => ['id' => '$id', 'orderId' => '$orderId']], 'state_machine' => ['graph' => 'sylius_payment', 'transition' => 'complete'], 'redirect' => 'referer']], ['orderId', 'id'], ['PUT' => 0], null, false, false, null]],
        970 => [[['_route' => 'sylius_admin_order_payment_refund', '_controller' => 'sylius.controller.payment:applyStateMachineTransitionAction', '_sylius' => ['permission' => true, 'repository' => ['method' => 'findOneByOrderId', 'arguments' => ['id' => '$id', 'orderId' => '$orderId']], 'state_machine' => ['graph' => 'sylius_payment', 'transition' => 'refund'], 'redirect' => 'referer', 'flash' => 'sylius.payment.refunded']], ['orderId', 'id'], ['PUT' => 0], null, false, false, null]],
        997 => [[['_route' => 'sylius_admin_order_shipment_ship', '_controller' => 'sylius.controller.shipment:updateAction', '_sylius' => ['event' => 'ship', 'repository' => ['method' => 'findOneByOrderId', 'arguments' => ['id' => '$id', 'orderId' => '$orderId']], 'state_machine' => ['graph' => 'sylius_shipment', 'transition' => 'ship'], 'redirect' => 'referer', 'section' => 'admin', 'permission' => true, 'form' => 'Sylius\\Bundle\\ShippingBundle\\Form\\Type\\ShipmentShipType', 'vars' => ['route' => ['parameters' => ['orderId' => '$orderId', 'id' => '$id']]]]], ['id'], ['PUT' => 0], null, false, false, null]],
        1032 => [[['_route' => 'sylius_admin_order_resend_confirmation_email', '_controller' => 'Sylius\\Bundle\\AdminBundle\\Action\\ResendOrderConfirmationEmailAction'], ['id'], ['GET' => 0], null, false, false, null]],
        1074 => [[['_route' => 'sylius_admin_payment_complete', '_controller' => 'sylius.controller.payment:applyStateMachineTransitionAction', '_sylius' => ['event' => 'complete', 'section' => 'admin', 'permission' => true, 'state_machine' => ['graph' => 'sylius_payment', 'transition' => 'complete'], 'redirect' => 'referer', 'flash' => 'sylius.payment.completed']], ['id'], ['PUT' => 0], null, false, false, null]],
        1112 => [[['_route' => 'sylius_admin_payment_method_update', '_controller' => 'sylius.controller.payment_method:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_payment_method_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_payment_methods_available_to_your_customers', 'templates' => ['form' => '@SyliusAdmin/PaymentMethod/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        1121 => [[['_route' => 'sylius_admin_payment_method_delete', '_controller' => 'sylius.controller.payment_method:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_payment_methods_available_to_your_customers', 'templates' => ['form' => '@SyliusAdmin/PaymentMethod/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        1143 => [[['_route' => 'sylius_admin_payment_method_create', '_controller' => 'sylius.controller.payment_method:createAction', '_sylius' => ['section' => 'admin', 'factory' => ['method' => 'createWithGateway', 'arguments' => ['gatewayFactory' => '$factory']], 'template' => '@SyliusAdmin/Crud/create.html.twig', 'redirect' => 'sylius_admin_payment_method_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_payment_methods_available_to_your_customers', 'templates' => ['form' => '@SyliusAdmin/PaymentMethod/_form.html.twig'], 'route' => ['parameters' => ['factory' => '$factory']]]]], ['factory'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1182 => [[['_route' => 'sylius_admin_product_delete', '_controller' => 'sylius.controller.product:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_your_product_catalog', 'templates' => ['form' => '@SyliusAdmin/Product/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        1196 => [[['_route' => 'sylius_admin_product_update', '_controller' => 'sylius.controller.product:updateAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'redirect' => 'referer', 'template' => '@SyliusAdmin/Crud/update.html.twig', 'vars' => ['subheader' => 'sylius.ui.manage_your_product_catalog', 'icon' => 'cube', 'templates' => ['form' => '@SyliusAdmin/Product/_form.html.twig', 'toolbar' => '@SyliusAdmin/Product/Update/_toolbar.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        1220 => [[['_route' => 'sylius_admin_product_per_taxon_index', '_controller' => 'sylius.controller.product:indexAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'grid' => 'sylius_admin_product_from_taxon', 'template' => '@SyliusAdmin/Product/index.html.twig', 'vars' => ['subheader' => 'sylius.ui.manage_your_product_catalog', 'icon' => 'cube']]], ['taxonId'], ['GET' => 0], null, false, true, null]],
        1232 => [[['_route' => 'sylius_admin_product_create', '_controller' => 'sylius.controller.product:createAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'template' => '@SyliusAdmin/Crud/create.html.twig', 'redirect' => 'sylius_admin_product_update', 'vars' => ['subheader' => 'sylius.ui.manage_your_product_catalog', 'templates' => ['form' => '@SyliusAdmin/Product/_form.html.twig'], 'route' => ['name' => 'sylius_admin_product_create']]]], [], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1252 => [[['_route' => 'sylius_admin_product_show', '_controller' => 'sylius.controller.product:showAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'template' => '@SyliusAdmin/Product/show.html.twig']], ['id'], ['GET' => 0], null, false, true, null]],
        1273 => [[['_route' => 'sylius_admin_product_variant_index', '_controller' => 'sylius.controller.product_variant:indexAction', '_sylius' => ['template' => '@SyliusAdmin/ProductVariant/index.html.twig', 'grid' => 'sylius_admin_product_variant', 'section' => 'admin', 'permission' => true, 'vars' => ['route' => ['parameters' => ['productId' => '$productId']], 'templates' => ['breadcrumb' => '@SyliusAdmin/ProductVariant/Index/_breadcrumb.html.twig'], 'icon' => 'cubes', 'subheader' => 'sylius.ui.manage_variants']]], ['productId'], ['GET' => 0], null, true, false, null]],
        1289 => [[['_route' => 'sylius_admin_product_variant_create', '_controller' => 'sylius.controller.product_variant:createAction', '_sylius' => ['factory' => ['method' => 'createForProduct', 'arguments' => ['expr:notFoundOnNull(service(\'sylius.repository.product\').find($productId))']], 'template' => '@SyliusAdmin/Crud/create.html.twig', 'grid' => 'sylius_admin_product_variant', 'section' => 'admin', 'redirect' => ['route' => 'sylius_admin_product_variant_index', 'parameters' => ['productId' => '$productId']], 'permission' => true, 'vars' => ['route' => ['parameters' => ['productId' => '$productId']], 'templates' => ['form' => '@SyliusAdmin/ProductVariant/_form.html.twig', 'breadcrumb' => '@SyliusAdmin/ProductVariant/Create/_breadcrumb.html.twig', 'header_title' => '@SyliusAdmin/ProductVariant/Create/_headerTitle.html.twig']]]], ['productId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1311 => [[['_route' => 'sylius_admin_product_variant_update', '_controller' => 'sylius.controller.product_variant:updateAction', '_sylius' => ['template' => '@SyliusAdmin/Crud/update.html.twig', 'grid' => 'sylius_admin_product_variant', 'section' => 'admin', 'redirect' => ['route' => 'sylius_admin_product_variant_index', 'parameters' => ['productId' => '$productId']], 'permission' => true, 'repository' => ['method' => 'findOneByIdAndProductId', 'arguments' => ['id' => '$id', 'productId' => '$productId']], 'vars' => ['route' => ['parameters' => ['id' => '$id', 'productId' => '$productId']], 'templates' => ['form' => '@SyliusAdmin/ProductVariant/_form.html.twig', 'breadcrumb' => '@SyliusAdmin/ProductVariant/Update/_breadcrumb.html.twig', 'toolbar' => '@SyliusAdmin/ProductVariant/Update/_toolbar.html.twig']]]], ['productId', 'id'], ['GET' => 0, 'PUT' => 1], null, false, false, null]],
        1332 => [[['_route' => 'sylius_admin_product_variant_bulk_delete', '_controller' => 'sylius.controller.product_variant:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'redirect' => 'referer', 'permission' => true, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], ['productId'], ['DELETE' => 0], null, false, false, null]],
        1349 => [[['_route' => 'sylius_admin_product_variant_delete', '_controller' => 'sylius.controller.product_variant:deleteAction', '_sylius' => ['section' => 'admin', 'redirect' => 'referer', 'permission' => true, 'repository' => ['method' => 'findOneByIdAndProductId', 'arguments' => ['id' => '$id', 'productId' => '$productId']]]], ['productId', 'id'], ['DELETE' => 0], null, false, true, null]],
        1366 => [[['_route' => 'sylius_admin_product_variant_generate', '_controller' => 'sylius.controller.product:updateAction', '_sylius' => ['template' => '@SyliusAdmin/ProductVariant/generate.html.twig', 'section' => 'admin', 'permission' => true, 'redirect' => ['route' => 'sylius_admin_product_variant_index', 'parameters' => ['productId' => '$productId']], 'form' => ['type' => 'Sylius\\Bundle\\ProductBundle\\Form\\Type\\ProductGenerateVariantsType'], 'repository' => ['method' => 'find', 'arguments' => ['$productId']], 'flash' => 'sylius.product_variant.generate']], ['productId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1422 => [[['_route' => 'sylius_admin_product_association_type_update', '_controller' => 'sylius.controller.product_association_type:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_product_association_type_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_association_types_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductAssociationType/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        1431 => [[['_route' => 'sylius_admin_product_association_type_delete', '_controller' => 'sylius.controller.product_association_type:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_association_types_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductAssociationType/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        1470 => [[['_route' => 'sylius_admin_product_attribute_update', '_controller' => 'sylius.controller.product_attribute:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_product_attribute_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_attributes_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductAttribute/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        1482 => [[['_route' => 'sylius_admin_product_attribute_create', '_controller' => 'sylius.controller.product_attribute:createAction', '_sylius' => ['section' => 'admin', 'factory' => ['method' => 'createTyped', 'arguments' => ['type' => '$type']], 'template' => '@SyliusAdmin/Crud/create.html.twig', 'redirect' => 'sylius_admin_product_attribute_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_attributes_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductAttribute/_form.html.twig'], 'route' => ['parameters' => ['type' => '$type']]]]], ['type'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1492 => [[['_route' => 'sylius_admin_product_attribute_delete', '_controller' => 'sylius.controller.product_attribute:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_attributes_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductAttribute/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        1527 => [[['_route' => 'sylius_admin_product_option_update', '_controller' => 'sylius.controller.product_option:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_product_option_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_configuration_options_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductOption/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        1536 => [[['_route' => 'sylius_admin_product_option_delete', '_controller' => 'sylius.controller.product_option:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_configuration_options_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductOption/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        1573 => [[['_route' => 'sylius_admin_product_review_update', '_controller' => 'sylius.controller.product_review:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_product_review_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_reviews_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductReview/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        1582 => [[['_route' => 'sylius_admin_product_review_delete', '_controller' => 'sylius.controller.product_review:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_reviews_of_your_products', 'templates' => ['form' => '@SyliusAdmin/ProductReview/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        1611 => [[['_route' => 'sylius_admin_product_review_accept', '_controller' => 'sylius.controller.product_review:applyStateMachineTransitionAction', '_sylius' => ['permission' => true, 'state_machine' => ['graph' => 'sylius_product_review', 'transition' => 'accept'], 'redirect' => 'referer', 'flash' => 'sylius.review.accept']], ['id'], ['PUT' => 0], null, false, false, null]],
        1626 => [[['_route' => 'sylius_admin_product_review_reject', '_controller' => 'sylius.controller.product_review:applyStateMachineTransitionAction', '_sylius' => ['permission' => true, 'state_machine' => ['graph' => 'sylius_product_review', 'transition' => 'reject'], 'redirect' => 'referer', 'flash' => 'sylius.review.reject']], ['id'], ['PUT' => 0], null, false, false, null]],
        1666 => [[['_route' => 'sylius_admin_promotion_update', '_controller' => 'sylius.controller.promotion:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_promotion_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_discounts_and_promotional_campaigns', 'templates' => ['form' => '@SyliusAdmin/Promotion/_form.html.twig', 'toolbar' => '@SyliusAdmin/Promotion/_toolbar.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        1685 => [[['_route' => 'sylius_admin_promotion_coupon_index', '_controller' => 'sylius.controller.promotion_coupon:indexAction', '_sylius' => ['template' => '@SyliusAdmin/PromotionCoupon/index.html.twig', 'grid' => 'sylius_admin_promotion_coupon', 'section' => 'admin', 'permission' => true, 'vars' => ['route' => ['parameters' => ['promotionId' => '$promotionId']], 'templates' => ['breadcrumb' => '@SyliusAdmin/PromotionCoupon/Index/_breadcrumb.html.twig'], 'icon' => 'tags', 'subheader' => 'sylius.ui.manage_coupons']]], ['promotionId'], ['GET' => 0], null, true, false, null]],
        1701 => [[['_route' => 'sylius_admin_promotion_coupon_create', '_controller' => 'sylius.controller.promotion_coupon:createAction', '_sylius' => ['factory' => ['method' => 'createForPromotion', 'arguments' => ['expr:notFoundOnNull(service(\'sylius.repository.promotion\').find($promotionId))']], 'template' => '@SyliusAdmin/Crud/create.html.twig', 'grid' => 'sylius_admin_promotion_coupon', 'section' => 'admin', 'redirect' => ['route' => 'sylius_admin_promotion_coupon_index', 'parameters' => ['promotionId' => '$promotionId']], 'permission' => true, 'vars' => ['route' => ['parameters' => ['promotionId' => '$promotionId']], 'templates' => ['form' => '@SyliusAdmin/PromotionCoupon/_form.html.twig', 'breadcrumb' => '@SyliusAdmin/PromotionCoupon/Create/_breadcrumb.html.twig', 'header_title' => '@SyliusAdmin/PromotionCoupon/Create/_headerTitle.html.twig']]]], ['promotionId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1723 => [[['_route' => 'sylius_admin_promotion_coupon_update', '_controller' => 'sylius.controller.promotion_coupon:updateAction', '_sylius' => ['template' => '@SyliusAdmin/Crud/update.html.twig', 'grid' => 'sylius_admin_promotion_coupon', 'section' => 'admin', 'redirect' => ['route' => 'sylius_admin_promotion_coupon_index', 'parameters' => ['promotionId' => '$promotionId']], 'permission' => true, 'vars' => ['route' => ['parameters' => ['id' => '$id', 'promotionId' => '$promotionId']], 'templates' => ['form' => '@SyliusAdmin/PromotionCoupon/_form.html.twig', 'breadcrumb' => '@SyliusAdmin/PromotionCoupon/Update/_breadcrumb.html.twig'], 'subheader' => 'sylius.ui.manage_discounts_and_promotional_campaigns']]], ['promotionId', 'id'], ['GET' => 0, 'PUT' => 1], null, false, false, null]],
        1740 => [[['_route' => 'sylius_admin_promotion_coupon_generate', '_controller' => 'sylius.controller.promotion_coupon:generateAction', '_sylius' => ['template' => '@SyliusAdmin/PromotionCoupon/generate.html.twig', 'section' => 'admin', 'redirect' => ['route' => 'sylius_admin_promotion_coupon_index', 'parameters' => ['promotionId' => '$promotionId']], 'permission' => true]], ['promotionId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1761 => [[['_route' => 'sylius_admin_promotion_coupon_bulk_delete', '_controller' => 'sylius.controller.promotion_coupon:bulkDeleteAction', '_sylius' => ['section' => 'admin', 'redirect' => 'referer', 'permission' => true, 'paginate' => false, 'repository' => ['method' => 'findById', 'arguments' => ['$ids']]]], ['promotionId'], ['DELETE' => 0], null, false, false, null]],
        1778 => [[['_route' => 'sylius_admin_promotion_coupon_delete', '_controller' => 'sylius.controller.promotion_coupon:deleteAction', '_sylius' => ['section' => 'admin', 'redirect' => 'referer', 'permission' => true]], ['promotionId', 'id'], ['DELETE' => 0], null, false, true, null]],
        1790 => [[['_route' => 'sylius_admin_promotion_delete', '_controller' => 'sylius.controller.promotion:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_discounts_and_promotional_campaigns', 'templates' => ['form' => '@SyliusAdmin/Promotion/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        1837 => [[['_route' => 'sylius_admin_shipment_ship', '_controller' => 'sylius.controller.shipment:updateAction', '_sylius' => ['event' => 'ship', 'section' => 'admin', 'permission' => true, 'state_machine' => ['graph' => 'sylius_shipment', 'transition' => 'ship'], 'redirect' => 'referer', 'flash' => 'sylius.shipment.shipped', 'form' => 'Sylius\\Bundle\\ShippingBundle\\Form\\Type\\ShipmentShipType']], ['id'], ['PUT' => 0], null, false, false, null]],
        1873 => [[['_route' => 'sylius_admin_shipment_resend_confirmation_email', '_controller' => 'Sylius\\Bundle\\AdminBundle\\Action\\ResendShipmentConfirmationEmailAction'], ['id'], ['GET' => 0], null, false, false, null]],
        1883 => [[['_route' => 'sylius_admin_shipment_show', '_controller' => 'sylius.controller.shipment:showAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'template' => '@SyliusAdmin/Shipment/show.html.twig']], ['id'], ['GET' => 0], null, false, true, null]],
        1929 => [[['_route' => 'sylius_admin_shipping_category_update', '_controller' => 'sylius.controller.shipping_category:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_shipping_category_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_categories_for_your_store', 'templates' => ['form' => '@SyliusAdmin/ShippingCategory/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        1938 => [[['_route' => 'sylius_admin_shipping_category_delete', '_controller' => 'sylius.controller.shipping_category:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_categories_for_your_store', 'templates' => ['form' => '@SyliusAdmin/ShippingCategory/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        1975 => [[['_route' => 'sylius_admin_shipping_method_update', '_controller' => 'sylius.controller.shipping_method:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_shipping_method_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_methods_for_your_store', 'templates' => ['form' => '@SyliusAdmin/ShippingMethod/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        1991 => [[['_route' => 'sylius_admin_shipping_method_archive', '_controller' => 'sylius.controller.shipping_method:updateAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'template' => '@SyliusUi/Grid/Action/archive.html.twig', 'form' => ['type' => 'Sylius\\Bundle\\ResourceBundle\\Form\\Type\\ArchivableType'], 'redirect' => ['route' => 'sylius_admin_shipping_method_index', 'parameters' => []]]], ['id'], ['PATCH' => 0], null, false, false, null]],
        2001 => [[['_route' => 'sylius_admin_shipping_method_delete', '_controller' => 'sylius.controller.shipping_method:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_shipping_methods_for_your_store', 'templates' => ['form' => '@SyliusAdmin/ShippingMethod/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        2030 => [[['_route' => 'sylius_admin_shop_user_delete', '_controller' => 'sylius.controller.shop_user:deleteAction', '_sylius' => ['section' => 'admin', 'redirect' => 'referer', 'permission' => true]], ['id'], ['DELETE' => 0], null, false, true, null]],
        2069 => [[['_route' => 'sylius_admin_taxon_update', '_controller' => 'sylius.controller.taxon:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Taxon/update.html.twig', 'redirect' => 'sylius_admin_taxon_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_categorization_of_your_products', 'templates' => ['form' => '@SyliusAdmin/Taxon/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        2078 => [[['_route' => 'sylius_admin_taxon_delete', '_controller' => 'sylius.controller.taxon:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_categorization_of_your_products', 'templates' => ['form' => '@SyliusAdmin/Taxon/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        2100 => [[['_route' => 'sylius_admin_taxon_create_for_parent', '_controller' => 'sylius.controller.taxon:createAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'template' => '@SyliusAdmin/Taxon/create.html.twig', 'redirect' => 'sylius_admin_taxon_update', 'factory' => ['method' => 'createForParent', 'arguments' => ['expr:notFoundOnNull(service("sylius.repository.taxon").find($id))']], 'vars' => ['subheader' => 'sylius.ui.manage_categorization_of_your_products', 'templates' => ['form' => '@SyliusAdmin/Taxon/_form.html.twig']]]], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        2142 => [[['_route' => 'sylius_admin_tax_category_update', '_controller' => 'sylius.controller.tax_category:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_tax_category_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_taxation_of_your_products', 'templates' => ['form' => '@SyliusAdmin/TaxCategory/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        2151 => [[['_route' => 'sylius_admin_tax_category_delete', '_controller' => 'sylius.controller.tax_category:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_taxation_of_your_products', 'templates' => ['form' => '@SyliusAdmin/TaxCategory/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        2183 => [[['_route' => 'sylius_admin_tax_rate_update', '_controller' => 'sylius.controller.tax_rate:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_tax_rate_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_taxation_of_your_products', 'templates' => ['form' => '@SyliusAdmin/TaxRate/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        2192 => [[['_route' => 'sylius_admin_tax_rate_delete', '_controller' => 'sylius.controller.tax_rate:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_taxation_of_your_products', 'templates' => ['form' => '@SyliusAdmin/TaxRate/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        2229 => [[['_route' => 'sylius_admin_zone_update', '_controller' => 'sylius.controller.zone:updateAction', '_sylius' => ['section' => 'admin', 'template' => '@SyliusAdmin\\Crud/update.html.twig', 'redirect' => 'sylius_admin_zone_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_geographical_zones', 'templates' => ['form' => '@SyliusAdmin/Zone/_form.html.twig']]]], ['id'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, false, null]],
        2238 => [[['_route' => 'sylius_admin_zone_delete', '_controller' => 'sylius.controller.zone:deleteAction', '_sylius' => ['section' => 'admin', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_geographical_zones', 'templates' => ['form' => '@SyliusAdmin/Zone/_form.html.twig']]]], ['id'], ['DELETE' => 0], null, false, true, null]],
        2275 => [[['_route' => 'sylius_admin_zone_create', '_controller' => 'sylius.controller.zone:createAction', '_sylius' => ['section' => 'admin', 'factory' => ['method' => 'createTyped', 'arguments' => ['type' => '$type']], 'template' => '@SyliusAdmin/Crud/create.html.twig', 'redirect' => 'sylius_admin_zone_update', 'permission' => true, 'vars' => ['subheader' => 'sylius.ui.manage_geographical_zones', 'templates' => ['form' => '@SyliusAdmin/Zone/_form.html.twig'], 'route' => ['parameters' => ['type' => '$type']]]]], ['type'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        2322 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        2354 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        2391 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        2433 => [[['_route' => 'api_addresses_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Address', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        2460 => [[['_route' => 'api_adjustments_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Adjustment', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        2502 => [
            [['_route' => 'api_administrators_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\AdminUser', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_administrators_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\AdminUser', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2541 => [
            [['_route' => 'api_administrators_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\AdminUser', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_administrators_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\AdminUser', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_administrators_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\AdminUser', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2584 => [[['_route' => 'api_avatar_images_admin_post_collection', '_controller' => 'Sylius\\Bundle\\ApiBundle\\Controller\\UploadAvatarImageAction', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\AvatarImage', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        2622 => [
            [['_route' => 'api_avatar_images_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\AvatarImage', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_avatar_images_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\AvatarImage', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2671 => [
            [['_route' => 'api_catalog_promotions_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\CatalogPromotion', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_catalog_promotions_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\CatalogPromotion', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code'], ['PUT' => 0], null, false, true, null],
        ],
        2719 => [[['_route' => 'api_catalog_promotion_actions_admin_get_item', '_controller' => 'ApiPlatform\\Core\\Action\\NotFoundAction', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Promotion\\Model\\CatalogPromotionAction', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2760 => [[['_route' => 'api_catalog_promotion_scopes_admin_get_item', '_controller' => 'ApiPlatform\\Core\\Action\\NotFoundAction', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\CatalogPromotionScope', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2790 => [[['_route' => 'api_catalog_promotion_translations_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Promotion\\Model\\CatalogPromotionTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        2823 => [[['_route' => 'api_channels_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Channel', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null]],
        2852 => [[['_route' => 'api_channels_shop_billing_data_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShopBillingData', '_api_identifiers' => ['code' => ['Sylius\\Component\\Core\\Model\\Channel', 'code', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_channels_shop_billing_data_get_subresource', '_api_subresource_context' => ['property' => 'shopBillingData', 'identifiers' => ['code' => ['Sylius\\Component\\Core\\Model\\Channel', 'code', true]], 'collection' => false, 'operationId' => 'api_channels_shop_billing_data_get_subresource']], ['code'], ['GET' => 0], null, false, false, null]],
        2898 => [[['_route' => 'api_channel_pricings_admin_get_item', '_controller' => 'ApiPlatform\\Core\\Action\\NotFoundAction', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ChannelPricing', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2928 => [
            [['_route' => 'api_countries_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Country', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_countries_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Country', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code'], ['PUT' => 0], null, false, true, null],
        ],
        2947 => [[['_route' => 'api_countries_provinces_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Province', '_api_identifiers' => ['code' => ['Sylius\\Component\\Addressing\\Model\\Country', 'code', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_countries_provinces_get_subresource', '_api_subresource_context' => ['property' => 'provinces', 'identifiers' => ['code' => ['Sylius\\Component\\Addressing\\Model\\Country', 'code', true]], 'collection' => true, 'operationId' => 'api_countries_provinces_get_subresource']], ['code'], ['GET' => 0], null, false, false, null]],
        2978 => [[['_route' => 'api_currencies_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Currency\\Model\\Currency', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null]],
        3006 => [[['_route' => 'api_customers_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Customer', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        3044 => [
            [['_route' => 'api_customer_groups_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Customer\\Model\\CustomerGroup', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_customer_groups_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Customer\\Model\\CustomerGroup', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3083 => [
            [['_route' => 'api_customer_groups_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Customer\\Model\\CustomerGroup', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_customer_groups_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Customer\\Model\\CustomerGroup', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_customer_groups_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Customer\\Model\\CustomerGroup', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['code', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3133 => [
            [['_route' => 'api_exchange_rates_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Currency\\Model\\ExchangeRate', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_exchange_rates_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Currency\\Model\\ExchangeRate', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3172 => [
            [['_route' => 'api_exchange_rates_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Currency\\Model\\ExchangeRate', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_exchange_rates_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Currency\\Model\\ExchangeRate', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_exchange_rates_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Currency\\Model\\ExchangeRate', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3199 => [[['_route' => 'api_locales_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Locale\\Model\\Locale', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null]],
        3229 => [[['_route' => 'api_orders_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['tokenValue'], ['GET' => 0], null, false, true, null]],
        3248 => [[['_route' => 'api_orders_admin_cancel_item', '_controller' => 'Sylius\\Bundle\\ApiBundle\\Applicator\\OrderStateMachineTransitionApplicatorInterface:cancel', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_cancel'], ['tokenValue'], ['PATCH' => 0], null, false, false, null]],
        3265 => [[['_route' => 'api_orders_payments_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Payment', '_api_identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_orders_payments_get_subresource', '_api_subresource_context' => ['property' => 'payments', 'identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true]], 'collection' => true, 'operationId' => 'api_orders_payments_get_subresource']], ['tokenValue'], ['GET' => 0], null, false, false, null]],
        3283 => [[['_route' => 'api_orders_shipments_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Shipment', '_api_identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_orders_shipments_get_subresource', '_api_subresource_context' => ['property' => 'shipments', 'identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true]], 'collection' => true, 'operationId' => 'api_orders_shipments_get_subresource']], ['tokenValue'], ['GET' => 0], null, false, false, null]],
        3316 => [[['_route' => 'api_order_items_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\OrderItem', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        3337 => [[['_route' => 'api_order_items_adjustments_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Adjustment', '_api_identifiers' => ['id' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\OrderItem', 'id', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_order_items_adjustments_get_subresource', '_api_subresource_context' => ['property' => 'adjustments', 'identifiers' => ['id' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\OrderItem', 'id', true]], 'collection' => true, 'operationId' => 'api_order_items_adjustments_get_subresource']], ['id'], ['GET' => 0], null, false, false, null]],
        3363 => [[['_route' => 'api_order_item_units_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\OrderItemUnit', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        3400 => [[['_route' => 'api_payments_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Payment', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        3418 => [[['_route' => 'api_payments_admin_complete_item', '_controller' => 'Sylius\\Bundle\\ApiBundle\\Applicator\\PaymentStateMachineTransitionApplicatorInterface:complete', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Payment', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_complete'], ['id'], ['PATCH' => 0], null, false, false, null]],
        3446 => [[['_route' => 'api_payment_methods_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\PaymentMethod', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null]],
        3481 => [
            [['_route' => 'api_products_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Product', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_products_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Product', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_products_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Product', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['code'], ['DELETE' => 0], null, false, true, null],
        ],
        3538 => [
            [['_route' => 'api_product_association_types_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductAssociationType', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_product_association_types_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductAssociationType', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3577 => [
            [['_route' => 'api_product_association_types_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductAssociationType', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_product_association_types_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductAssociationType', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_product_association_types_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductAssociationType', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['code', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3628 => [[['_route' => 'api_product_association_type_translations_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductAssociationTypeTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        3653 => [[['_route' => 'api_product_images_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductImage', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        3684 => [
            [['_route' => 'api_product_options_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductOption', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_product_options_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductOption', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code'], ['PUT' => 0], null, false, true, null],
        ],
        3700 => [[['_route' => 'api_product_options_values_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductOptionValue', '_api_identifiers' => ['code' => ['Sylius\\Component\\Product\\Model\\ProductOption', 'code', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_product_options_values_get_subresource', '_api_subresource_context' => ['property' => 'values', 'identifiers' => ['code' => ['Sylius\\Component\\Product\\Model\\ProductOption', 'code', true]], 'collection' => true, 'operationId' => 'api_product_options_values_get_subresource']], ['code'], ['GET' => 0], null, false, false, null]],
        3753 => [[['_route' => 'api_product_option_translations_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductOptionTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        3777 => [[['_route' => 'api_product_option_values_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductOptionValue', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null]],
        3807 => [
            [['_route' => 'api_product_reviews_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductReview', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_product_reviews_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductReview', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_product_reviews_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductReview', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        3826 => [[['_route' => 'api_product_reviews_admin_accept_item', '_controller' => 'Sylius\\Bundle\\ApiBundle\\Applicator\\ProductReviewStateMachineTransitionApplicatorInterface:accept', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductReview', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_accept'], ['id'], ['PATCH' => 0], null, false, false, null]],
        3841 => [[['_route' => 'api_product_reviews_admin_reject_item', '_controller' => 'Sylius\\Bundle\\ApiBundle\\Applicator\\ProductReviewStateMachineTransitionApplicatorInterface:reject', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductReview', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_reject'], ['id'], ['PATCH' => 0], null, false, false, null]],
        3870 => [[['_route' => 'api_product_taxa_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductTaxon', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        3899 => [[['_route' => 'api_product_translations_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        3932 => [
            [['_route' => 'api_product_variants_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductVariant', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_product_variants_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductVariant', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code'], ['PUT' => 0], null, false, true, null],
        ],
        3964 => [[['_route' => 'api_product_variant_translations_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductVariantTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        4004 => [
            [['_route' => 'api_promotions_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Promotion', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => 'api_promotions_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Promotion', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        4043 => [
            [['_route' => 'api_promotions_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Promotion', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_promotions_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Promotion', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['code', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        4089 => [
            [['_route' => 'api_provinces_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Province', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_provinces_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Province', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        4128 => [[['_route' => 'api_shipments_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Shipment', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        4142 => [[['_route' => 'api_shipments_admin_ship_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Shipment', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_ship'], ['id'], ['PATCH' => 0], null, false, false, null]],
        4192 => [
            [['_route' => 'api_shipping_categories_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Shipping\\Model\\ShippingCategory', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_shipping_categories_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Shipping\\Model\\ShippingCategory', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        4231 => [
            [['_route' => 'api_shipping_categories_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Shipping\\Model\\ShippingCategory', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_shipping_categories_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Shipping\\Model\\ShippingCategory', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_shipping_categories_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Shipping\\Model\\ShippingCategory', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['code', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        4264 => [
            [['_route' => 'api_shipping_methods_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShippingMethod', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_shipping_methods_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShippingMethod', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_shipping_methods_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShippingMethod', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['code'], ['DELETE' => 0], null, false, true, null],
        ],
        4284 => [[['_route' => 'api_shipping_methods_admin_archive_item', '_controller' => 'Sylius\\Bundle\\ApiBundle\\Applicator\\ArchivingShippingMethodApplicatorInterface:archive', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShippingMethod', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_archive'], ['code'], ['PATCH' => 0], null, false, false, null]],
        4300 => [[['_route' => 'api_shipping_methods_admin_restore_item', '_controller' => 'Sylius\\Bundle\\ApiBundle\\Applicator\\ArchivingShippingMethodApplicatorInterface:restore', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShippingMethod', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_restore'], ['code'], ['PATCH' => 0], null, false, false, null]],
        4334 => [[['_route' => 'api_shipping_method_translations_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Shipping\\Model\\ShippingMethodTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        4390 => [[['_route' => 'api_shop_billing_datas_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShopBillingData', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        4439 => [
            [['_route' => 'api_tax_categories_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Taxation\\Model\\TaxCategory', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_tax_categories_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Taxation\\Model\\TaxCategory', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        4478 => [
            [['_route' => 'api_tax_categories_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Taxation\\Model\\TaxCategory', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_tax_categories_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Taxation\\Model\\TaxCategory', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_tax_categories_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Taxation\\Model\\TaxCategory', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['code', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        4507 => [
            [['_route' => 'api_taxa_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Taxon', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_taxa_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Taxon', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code'], ['PUT' => 0], null, false, true, null],
        ],
        4540 => [[['_route' => 'api_taxon_translations_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Taxonomy\\Model\\TaxonTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['id'], ['GET' => 0], null, false, true, null]],
        4580 => [
            [['_route' => 'api_zones_admin_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Zone', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_zones_admin_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Zone', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'admin_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        4622 => [
            [['_route' => 'api_zones_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Zone', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_zones_admin_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Zone', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_put'], ['code', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_zones_admin_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Zone', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_delete'], ['code', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        4663 => [[['_route' => 'api_zones_members_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\ZoneMember', '_api_identifiers' => ['code' => ['Sylius\\Component\\Addressing\\Model\\Zone', 'code', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_zones_members_get_subresource', '_api_subresource_context' => ['property' => 'members', 'identifiers' => ['code' => ['Sylius\\Component\\Addressing\\Model\\Zone', 'code', true]], 'collection' => true, 'operationId' => 'api_zones_members_get_subresource']], ['code', '_format'], ['GET' => 0], null, false, true, null]],
        4709 => [[['_route' => 'api_zone_members_admin_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\ZoneMember', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'admin_get'], ['code', '_format'], ['GET' => 0], null, false, true, null]],
        4755 => [
            [['_route' => 'api_addresses_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Address', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_addresses_shop_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Address', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_addresses_shop_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Address', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_put'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        4783 => [[['_route' => 'api_adjustments_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Adjustment', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        4836 => [[['_route' => 'api_orders_shop_account_change_payment_method_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_account_change_payment_method'], ['tokenValue', 'paymentId'], ['PATCH' => 0], null, false, true, null]],
        4878 => [[['_route' => 'api_verify_customer_accounts_shop_verify_customer_account_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Bundle\\ApiBundle\\Command\\Account\\VerifyCustomerAccount', '_api_identifiers' => ['token'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_verify_customer_account'], ['token'], ['PATCH' => 0], null, false, true, null]],
        4920 => [[['_route' => 'api_catalog_promotions_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\CatalogPromotion', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        4945 => [[['_route' => 'api_channels_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Channel', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        4971 => [[['_route' => 'api_countries_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Addressing\\Model\\Country', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        5001 => [[['_route' => 'api_currencies_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Currency\\Model\\Currency', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        5029 => [[['_route' => 'api_customers_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Customer', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5047 => [[['_route' => 'api_customers_shop_password_update_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Customer', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_password_update'], ['id'], ['PUT' => 0], null, false, false, null]],
        5056 => [[['_route' => 'api_customers_shop_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Customer', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_put'], ['id'], ['PUT' => 0], null, false, true, null]],
        5084 => [[['_route' => 'api_locales_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Locale\\Model\\Locale', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        5114 => [
            [['_route' => 'api_orders_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['tokenValue'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_orders_shop_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_delete'], ['tokenValue'], ['DELETE' => 0], null, false, true, null],
        ],
        5135 => [[['_route' => 'api_orders_shop_add_item_item', '_controller' => 'api_platform.action.post_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_add_item'], ['tokenValue'], ['POST' => 0], null, false, false, null]],
        5156 => [[['_route' => 'api_orders_shop_remove_item_item', '_controller' => 'Sylius\\Bundle\\ApiBundle\\Controller\\DeleteOrderItemAction', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_remove_item'], ['tokenValue', 'itemId'], ['DELETE' => 0], null, false, true, null]],
        5165 => [[['_route' => 'api_orders_shop_change_quantity_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_change_quantity'], ['tokenValue', 'orderItemId'], ['PATCH' => 0], null, false, true, null]],
        5186 => [[['_route' => 'api_orders_items_adjustments_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Adjustment', '_api_identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true], 'items' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\OrderItem', 'id', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_orders_items_adjustments_get_subresource', '_api_subresource_context' => ['property' => 'adjustments', 'identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true], 'items' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\OrderItem', 'id', true]], 'collection' => true, 'operationId' => 'api_orders_items_adjustments_get_subresource']], ['tokenValue', 'items'], ['GET' => 0], null, false, false, null]],
        5196 => [[['_route' => 'api_orders_items_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\OrderItem', '_api_identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_orders_items_get_subresource', '_api_subresource_context' => ['property' => 'items', 'identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true]], 'collection' => true, 'operationId' => 'api_orders_items_get_subresource']], ['tokenValue'], ['GET' => 0], null, false, false, null]],
        5227 => [[['_route' => 'api_orders_shop_select_shipping_method_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_select_shipping_method'], ['tokenValue', 'shipmentId'], ['PATCH' => 0], null, false, true, null]],
        5244 => [[['_route' => 'api_orders_shipments_methods_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShippingMethod', '_api_identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true], 'shipments' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Shipment', 'id', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_orders_shipments_methods_get_subresource', '_api_subresource_context' => ['property' => 'method', 'identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true], 'shipments' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Shipment', 'id', true]], 'collection' => true, 'operationId' => 'api_orders_shipments_methods_get_subresource']], ['tokenValue', 'shipments'], ['GET' => 0], null, false, false, null]],
        5274 => [[['_route' => 'api_orders_shop_select_payment_method_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_select_payment_method'], ['tokenValue', 'paymentId'], ['PATCH' => 0], null, false, true, null]],
        5300 => [[['_route' => 'api_orders_get_configuration_item', '_controller' => 'Sylius\\Bundle\\ApiBundle\\Controller\\Payment\\GetPaymentConfiguration', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get_configuration'], ['tokenValue', 'paymentId'], ['GET' => 0], null, false, false, null]],
        5316 => [[['_route' => 'api_orders_payments_methods_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\PaymentMethod', '_api_identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true], 'payments' => ['Sylius\\Component\\Core\\Model\\Payment', 'id', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_orders_payments_methods_get_subresource', '_api_subresource_context' => ['property' => 'method', 'identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true], 'payments' => ['Sylius\\Component\\Core\\Model\\Payment', 'id', true]], 'collection' => true, 'operationId' => 'api_orders_payments_methods_get_subresource']], ['tokenValue', 'payments'], ['GET' => 0], null, false, false, null]],
        5335 => [[['_route' => 'api_orders_shop_complete_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_complete'], ['tokenValue'], ['PATCH' => 0], null, false, false, null]],
        5355 => [[['_route' => 'api_orders_adjustments_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Adjustment', '_api_identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_orders_adjustments_get_subresource', '_api_subresource_context' => ['property' => 'adjustments', 'identifiers' => ['tokenValue' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', 'tokenValue', true]], 'collection' => true, 'operationId' => 'api_orders_adjustments_get_subresource']], ['tokenValue'], ['GET' => 0], null, false, false, null]],
        5365 => [[['_route' => 'api_orders_shop_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Order', '_api_identifiers' => ['tokenValue'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_put'], ['tokenValue'], ['PUT' => 0], null, false, true, null]],
        5394 => [[['_route' => 'api_order_items_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\OrderItem', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5419 => [[['_route' => 'api_order_item_units_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\OrderItemUnit', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5456 => [[['_route' => 'api_payments_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Payment', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5473 => [[['_route' => 'api_payments_methods_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\PaymentMethod', '_api_identifiers' => ['id' => ['Sylius\\Component\\Core\\Model\\Payment', 'id', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_payments_methods_get_subresource', '_api_subresource_context' => ['property' => 'method', 'identifiers' => ['id' => ['Sylius\\Component\\Core\\Model\\Payment', 'id', true]], 'collection' => true, 'operationId' => 'api_payments_methods_get_subresource']], ['id'], ['GET' => 0], null, false, false, null]],
        5501 => [[['_route' => 'api_payment_methods_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\PaymentMethod', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        5533 => [[['_route' => 'api_products_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Product', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        5561 => [[['_route' => 'api_products_shop_get_by_slug_item', '_controller' => 'Sylius\\Bundle\\ApiBundle\\Controller\\GetProductBySlugAction', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Product', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get_by_slug'], ['slug'], ['GET' => 0], null, false, true, null]],
        5591 => [[['_route' => 'api_product_images_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductImage', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5619 => [[['_route' => 'api_product_options_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductOption', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        5645 => [[['_route' => 'api_product_option_values_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductOptionValue', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        5671 => [[['_route' => 'api_product_reviews_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductReview', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5698 => [[['_route' => 'api_product_taxa_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductTaxon', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5727 => [[['_route' => 'api_product_translations_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5757 => [[['_route' => 'api_product_variants_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ProductVariant', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        5788 => [[['_route' => 'api_product_variant_translations_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Product\\Model\\ProductVariantTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5835 => [[['_route' => 'api_reset_password_requests_shop_update_reset_password_request_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Bundle\\ApiBundle\\Command\\Account\\ResetPassword', '_api_identifiers' => ['resetPasswordToken'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_update_reset_password_request'], ['resetPasswordToken'], ['PATCH' => 0], null, false, true, null]],
        5868 => [[['_route' => 'api_shipments_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Shipment', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5885 => [[['_route' => 'api_shipments_methods_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShippingMethod', '_api_identifiers' => ['id' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Shipment', 'id', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_shipments_methods_get_subresource', '_api_subresource_context' => ['property' => 'method', 'identifiers' => ['id' => ['BitBag\\SyliusMultiVendorMarketplacePlugin\\Entity\\Shipment', 'id', true]], 'collection' => true, 'operationId' => 'api_shipments_methods_get_subresource']], ['id'], ['GET' => 0], null, false, false, null]],
        5920 => [[['_route' => 'api_shipping_methods_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\ShippingMethod', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        5952 => [[['_route' => 'api_shipping_method_translations_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Shipping\\Model\\ShippingMethodTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        5981 => [[['_route' => 'api_taxa_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Core\\Model\\Taxon', '_api_identifiers' => ['code'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['code'], ['GET' => 0], null, false, true, null]],
        6013 => [[['_route' => 'api_taxon_translations_shop_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'Sylius\\Component\\Taxonomy\\Model\\TaxonTranslation', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'shop_get'], ['id'], ['GET' => 0], null, false, true, null]],
        6120 => [[['_route' => 'sylius_shop_ajax_user_check_action', '_controller' => 'sylius.controller.shop_user:showAction', '_format' => 'json', '_sylius' => ['repository' => ['method' => 'findOneByEmail', 'arguments' => ['email' => '$email']], 'serialization_groups' => ['Secured']]], ['_locale'], ['GET' => 0], null, false, false, null]],
        6219 => [[['_route' => 'sylius_shop_ajax_cart_add_item', '_controller' => 'sylius.controller.order_item:addAction', '_format' => 'json', '_sylius' => ['factory' => ['method' => 'createForProduct', 'arguments' => ['expr:notFoundOnNull(service(\'sylius.repository.product\').find($productId))']], 'form' => ['type' => 'Sylius\\Bundle\\CoreBundle\\Form\\Type\\Order\\AddToCartType', 'options' => ['product' => 'expr:notFoundOnNull(service(\'sylius.repository.product\').find($productId))']], 'redirect' => ['route' => 'sylius_shop_cart_summary', 'parameters' => []], 'flash' => 'sylius.cart.add_item']], ['_locale'], ['POST' => 0], null, false, false, null]],
        6330 => [[['_route' => 'sylius_shop_ajax_cart_item_remove', '_controller' => 'sylius.controller.order_item:removeAction', '_format' => 'json', '_sylius' => ['flash' => 'sylius.cart.remove_item']], ['_locale', 'id'], ['DELETE' => 0], null, false, false, null]],
        6443 => [[['_route' => 'sylius_shop_ajax_render_province_form', '_controller' => 'sylius.controller.province:choiceOrTextFieldFormAction', '_sylius' => ['template' => '@SyliusShop/Common/Form/_province.html.twig']], ['_locale'], ['GET' => 0], null, false, false, null]],
        6558 => [[['_route' => 'sylius_shop_partial_taxon_show_by_slug', '_controller' => 'sylius.controller.taxon:showAction', '_sylius' => ['template' => '$template', 'repository' => ['method' => 'findOneBySlug', 'arguments' => ['$slug', 'expr:service(\'sylius.context.locale\').getLocaleCode()']]]], ['_locale', 'slug'], ['GET' => 0], null, false, true, null]],
        6677 => [[['_route' => 'sylius_shop_partial_taxon_index_by_code', '_controller' => 'sylius.controller.taxon:indexAction', '_sylius' => ['template' => '$template', 'repository' => ['method' => 'findChildren', 'arguments' => ['$code', 'expr:service(\'sylius.context.locale\').getLocaleCode()']]]], ['_locale', 'code'], ['GET' => 0], null, false, true, null]],
        6803 => [[['_route' => 'sylius_shop_partial_channel_menu_taxon_index', '_controller' => 'sylius.controller.taxon:indexAction', '_sylius' => ['template' => '$template', 'repository' => ['method' => 'findChildrenByChannelMenuTaxon', 'arguments' => ['expr:service(\'sylius.context.channel\').getChannel().getMenuTaxon()', 'expr:service(\'sylius.context.locale\').getLocaleCode()']]]], ['_locale'], ['GET' => 0], null, true, false, null]],
        6910 => [[['_route' => 'sylius_shop_partial_cart_summary', '_controller' => 'sylius.controller.order:widgetAction', '_sylius' => ['template' => '$template']], ['_locale'], ['GET' => 0], null, false, false, null]],
        7019 => [[['_route' => 'sylius_shop_partial_cart_add_item', '_controller' => 'sylius.controller.order_item:addAction', '_sylius' => ['template' => '$template', 'factory' => ['method' => 'createForProduct', 'arguments' => ['expr:notFoundOnNull(service(\'sylius.repository.product\').find($productId))']], 'form' => ['type' => 'Sylius\\Bundle\\CoreBundle\\Form\\Type\\Order\\AddToCartType', 'options' => ['product' => 'expr:notFoundOnNull(service(\'sylius.repository.product\').find($productId))']], 'redirect' => ['route' => 'sylius_shop_cart_summary', 'parameters' => []]]], ['_locale'], ['GET' => 0], null, false, false, null]],
        7138 => [[['_route' => 'sylius_shop_partial_product_index_latest', '_controller' => 'sylius.controller.product:indexAction', '_sylius' => ['template' => '$template', 'repository' => ['method' => 'findLatestByChannel', 'arguments' => ['expr:service(\'sylius.context.channel\').getChannel()', 'expr:service(\'sylius.context.locale\').getLocaleCode()', '!!int $count']]]], ['_locale', 'count'], ['GET' => 0], null, false, true, null]],
        7250 => [[['_route' => 'sylius_shop_partial_product_show_by_slug', '_controller' => 'sylius.controller.product:showAction', '_sylius' => ['template' => '$template', 'repository' => ['method' => 'findOneByChannelAndSlug', 'arguments' => ['expr:service(\'sylius.context.channel\').getChannel()', 'expr:service(\'sylius.context.locale\').getLocaleCode()', '$slug']]]], ['_locale', 'slug'], ['GET' => 0], null, false, true, null]],
        7391 => [[['_route' => 'sylius_shop_partial_product_review_latest', '_controller' => 'sylius.controller.product_review:indexAction', '_sylius' => ['template' => '$template', 'repository' => ['method' => 'findLatestByProductId', 'arguments' => ['$productId', '!!int $count']]], 'count' => 3], ['_locale', 'productId', 'count'], ['GET' => 0], null, false, true, null]],
        7525 => [[['_route' => 'sylius_shop_partial_product_association_show', '_controller' => 'sylius.controller.product_association:showAction', '_sylius' => ['template' => '$template']], ['_locale', 'productId', 'id'], ['GET' => 0], null, false, true, null]],
        7610 => [[['_route' => 'sylius_shop_homepage', '_controller' => 'sylius.controller.shop.homepage:indexAction'], ['_locale'], ['GET' => 0], null, true, true, null]],
        7701 => [[['_route' => 'sylius_shop_login', '_controller' => 'sylius.controller.security:loginAction', '_sylius' => ['template' => '@SyliusShop/login.html.twig', 'logged_in_route' => 'sylius_shop_account_dashboard']], ['_locale'], ['GET' => 0], null, false, false, null]],
        7799 => [[['_route' => 'sylius_shop_login_check', '_controller' => 'sylius.controller.security:checkAction'], ['_locale'], ['POST' => 0], null, false, false, null]],
        7891 => [[['_route' => 'sylius_shop_logout'], ['_locale'], ['GET' => 0], null, false, false, null]],
        7985 => [[['_route' => 'sylius_shop_register', '_controller' => 'sylius.controller.customer:createAction', '_sylius' => ['template' => '@SyliusShop/register.html.twig', 'form' => 'Sylius\\Bundle\\CoreBundle\\Form\\Type\\Customer\\CustomerRegistrationType', 'event' => 'register', 'redirect' => ['route' => 'sylius_shop_account_dashboard'], 'flash' => 'sylius.customer.register']], ['_locale'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        8105 => [[['_route' => 'sylius_shop_register_after_checkout', '_controller' => 'sylius.controller.customer:createAction', '_sylius' => ['form' => 'Sylius\\Bundle\\CoreBundle\\Form\\Type\\Customer\\CustomerRegistrationType', 'factory' => ['method' => ['expr:service("sylius.factory.customer_after_checkout")', 'createAfterCheckout'], 'arguments' => ['expr:service("sylius.repository.order").findOneByTokenValue($tokenValue)']], 'template' => '@SyliusShop/register.html.twig', 'event' => 'register', 'redirect' => ['route' => 'sylius_shop_account_dashboard'], 'flash' => 'sylius.customer.register']], ['_locale', 'tokenValue'], ['GET' => 0], null, false, true, null]],
        8210 => [[['_route' => 'sylius_shop_request_password_reset_token', '_controller' => 'sylius.controller.shop_user:requestPasswordResetTokenAction', '_sylius' => ['template' => '@SyliusShop/Account/requestPasswordReset.html.twig', 'redirect' => 'sylius_shop_login']], ['_locale'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        8324 => [[['_route' => 'sylius_shop_password_reset', '_controller' => 'sylius.controller.shop_user:resetPasswordAction', '_sylius' => ['template' => '@SyliusShop/Account/resetPassword.html.twig', 'redirect' => 'sylius_shop_login']], ['_locale', 'token'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        8416 => [[['_route' => 'sylius_shop_user_request_verification_token', '_controller' => 'sylius.controller.shop_user:requestVerificationTokenAction'], ['_locale'], ['POST' => 0], null, false, false, null]],
        8517 => [[['_route' => 'sylius_shop_user_verification', '_controller' => 'sylius.controller.shop_user:verifyAction', '_sylius' => ['redirect' => 'sylius_shop_account_dashboard']], ['_locale', 'token'], ['GET' => 0], null, false, true, null]],
        8620 => [[['_route' => 'sylius_shop_product_show', '_controller' => 'sylius.controller.product:showAction', '_sylius' => ['template' => '@SyliusShop/Product/show.html.twig', 'repository' => ['method' => 'findOneByChannelAndSlug', 'arguments' => ['expr:service(\'sylius.context.channel\').getChannel()', 'expr:service(\'sylius.context.locale\').getLocaleCode()', '$slug']]]], ['_locale', 'slug'], ['GET' => 0], null, false, true, null]],
        8723 => [[['_route' => 'sylius_shop_product_index', '_controller' => 'sylius.controller.product:indexAction', '_sylius' => ['template' => '@SyliusShop/Product/index.html.twig', 'grid' => 'sylius_shop_product']], ['_locale', 'slug'], ['GET' => 0], null, false, true, null]],
        8834 => [[['_route' => 'sylius_shop_product_review_index', '_controller' => 'sylius.controller.product_review:indexAction', '_sylius' => ['template' => '@SyliusShop/ProductReview/index.html.twig', 'repository' => ['method' => 'findAcceptedByProductSlugAndChannel', 'arguments' => ['$slug', 'expr:service(\'sylius.context.locale\').getLocaleCode()', 'expr:service(\'sylius.context.channel\').getChannel()']]]], ['_locale', 'slug'], ['GET' => 0], null, true, false, null]],
        8949 => [[['_route' => 'sylius_shop_product_review_create', '_controller' => 'sylius.controller.product_review:createAction', '_sylius' => ['template' => '@SyliusShop/ProductReview/create.html.twig', 'form' => ['options' => ['validation_groups' => ['sylius', 'sylius_review']]], 'factory' => ['method' => 'createForSubjectWithReviewer', 'arguments' => ['expr:notFoundOnNull(service(\'sylius.repository.product\').findOneByChannelAndSlug(service(\'sylius.context.channel\').getChannel(), service(\'sylius.context.locale\').getLocaleCode(), $slug))', 'expr:service(\'sylius.context.customer\').getCustomer()']], 'redirect' => ['route' => 'sylius_shop_product_show', 'parameters' => ['slug' => '$slug']], 'flash' => 'sylius.review.wait_for_the_acceptation']], ['_locale', 'slug'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        9042 => [
            [['_route' => 'sylius_shop_cart_summary', '_controller' => 'sylius.controller.order:summaryAction', '_sylius' => ['template' => '@SyliusShop/Cart/summary.html.twig', 'form' => 'Sylius\\Bundle\\OrderBundle\\Form\\Type\\CartType']], ['_locale'], ['GET' => 0], null, true, false, null],
            [['_route' => 'sylius_shop_cart_save', '_controller' => 'sylius.controller.order:saveAction', '_sylius' => ['template' => '@SyliusShop/Cart/summary.html.twig', 'redirect' => 'sylius_shop_cart_summary', 'form' => 'Sylius\\Bundle\\OrderBundle\\Form\\Type\\CartType', 'flash' => 'sylius.cart.save']], ['_locale'], ['PUT' => 0, 'PATCH' => 1], null, true, false, null],
            [['_route' => 'sylius_shop_cart_clear', '_controller' => 'sylius.controller.order:clearAction', '_sylius' => ['redirect' => 'sylius_shop_cart_summary']], ['_locale'], ['DELETE' => 0], null, true, false, null],
        ],
        9149 => [[['_route' => 'sylius_shop_cart_item_remove', '_controller' => 'sylius.controller.order_item:removeAction', '_sylius' => ['flash' => 'sylius.cart.remove_item', 'redirect' => ['route' => 'sylius_shop_cart_summary', 'parameters' => []]]], ['_locale', 'id'], ['DELETE' => 0], null, false, false, null]],
        9243 => [[['_route' => 'sylius_shop_checkout_start', '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController:redirectAction', 'route' => 'sylius_shop_checkout_address'], ['_locale'], ['GET' => 0], null, true, false, null]],
        9345 => [[['_route' => 'sylius_shop_checkout_address', '_controller' => 'sylius.controller.order:updateAction', '_sylius' => ['event' => 'address', 'flash' => false, 'template' => '@SyliusShop/Checkout/address.html.twig', 'form' => ['type' => 'Sylius\\Bundle\\CoreBundle\\Form\\Type\\Checkout\\AddressType', 'options' => ['customer' => 'expr:service(\'sylius.context.customer\').getCustomer()']], 'repository' => ['method' => 'findCartForAddressing', 'arguments' => ['expr:service(\'sylius.context.cart\').getCart().getId()']], 'state_machine' => ['graph' => 'sylius_order_checkout', 'transition' => 'address']]], ['_locale'], ['GET' => 0, 'PUT' => 1], null, false, false, null]],
        9456 => [[['_route' => 'sylius_shop_checkout_select_shipping', '_controller' => 'sylius.controller.order:updateAction', '_sylius' => ['event' => 'select_shipping', 'flash' => false, 'template' => '@SyliusShop/Checkout/selectShipping.html.twig', 'form' => 'Sylius\\Bundle\\CoreBundle\\Form\\Type\\Checkout\\SelectShippingType', 'repository' => ['method' => 'findCartForSelectingShipping', 'arguments' => ['expr:service(\'sylius.context.cart\').getCart().getId()']], 'state_machine' => ['graph' => 'sylius_order_checkout', 'transition' => 'select_shipping']]], ['_locale'], ['GET' => 0, 'PUT' => 1], null, false, false, null]],
        9566 => [[['_route' => 'sylius_shop_checkout_select_payment', '_controller' => 'sylius.controller.order:updateAction', '_sylius' => ['event' => 'payment', 'flash' => false, 'template' => '@SyliusShop/Checkout/selectPayment.html.twig', 'form' => 'Sylius\\Bundle\\CoreBundle\\Form\\Type\\Checkout\\SelectPaymentType', 'repository' => ['method' => 'findCartForSelectingPayment', 'arguments' => ['expr:service(\'sylius.context.cart\').getCart().getId()']], 'state_machine' => ['graph' => 'sylius_order_checkout', 'transition' => 'select_payment']]], ['_locale'], ['GET' => 0, 'PUT' => 1], null, false, false, null]],
        9669 => [[['_route' => 'sylius_shop_checkout_complete', '_controller' => 'sylius.controller.order:updateAction', '_sylius' => ['event' => 'complete', 'flash' => false, 'template' => '@SyliusShop/Checkout/complete.html.twig', 'repository' => ['method' => 'findCartForSummary', 'arguments' => ['expr:service(\'sylius.context.cart\').getCart().getId()']], 'state_machine' => ['graph' => 'sylius_order_checkout', 'transition' => 'complete'], 'redirect' => ['route' => 'sylius_shop_order_pay', 'parameters' => ['tokenValue' => 'resource.tokenValue']], 'form' => ['type' => 'Sylius\\Bundle\\CoreBundle\\Form\\Type\\Checkout\\CompleteType', 'options' => ['validation_groups' => 'sylius_checkout_complete']]]], ['_locale'], ['GET' => 0, 'PUT' => 1], null, false, false, null]],
        9762 => [[['_route' => 'sylius_shop_contact_request', '_controller' => 'sylius.controller.shop.contact:requestAction', '_sylius' => ['redirect' => 'sylius_shop_homepage']], ['_locale'], ['GET' => 0, 'POST' => 1], null, true, false, null]],
        9864 => [[['_route' => 'sylius_shop_order_thank_you', '_controller' => 'sylius.controller.order:thankYouAction', '_sylius' => ['template' => '@SyliusShop/Order/thankYou.html.twig']], ['_locale'], ['GET' => 0], null, false, false, null]],
        9968 => [[['_route' => 'sylius_shop_order_pay', '_controller' => 'sylius.controller.payum:prepareCaptureAction', '_sylius' => ['redirect' => ['route' => 'sylius_shop_order_after_pay']]], ['_locale', 'tokenValue'], ['GET' => 0], null, false, false, null]],
        10070 => [[['_route' => 'sylius_shop_order_after_pay', '_controller' => 'sylius.controller.payum:afterCaptureAction'], ['_locale'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        10171 => [[['_route' => 'sylius_shop_order_show', '_controller' => 'sylius.controller.order:updateAction', '_sylius' => ['template' => '@SyliusShop/Order/show.html.twig', 'repository' => ['method' => 'findOneBy', 'arguments' => [['tokenValue' => '$tokenValue']]], 'form' => ['type' => 'Sylius\\Bundle\\CoreBundle\\Form\\Type\\Checkout\\SelectPaymentType', 'options' => ['validation_groups' => []]], 'redirect' => ['route' => 'sylius_shop_order_pay', 'parameters' => ['tokenValue' => 'resource.tokenValue']], 'flash' => false]], ['_locale', 'tokenValue'], ['GET' => 0, 'PUT' => 1], null, false, true, null]],
        10272 => [[['_route' => 'sylius_shop_account_order_index', '_controller' => 'sylius.controller.order:indexAction', '_sylius' => ['section' => 'shop_account', 'template' => '@SyliusShop/Account/Order/index.html.twig', 'grid' => 'sylius_shop_account_order']], ['_locale'], ['GET' => 0], null, true, false, null]],
        10382 => [[['_route' => 'sylius_shop_account_order_show', '_controller' => 'sylius.controller.order:showAction', '_sylius' => ['section' => 'shop_account', 'template' => '@SyliusShop/Account/Order/show.html.twig', 'repository' => ['method' => 'findOneByNumberAndCustomer', 'arguments' => ['$number', 'expr:service(\'sylius.context.customer\').getCustomer()']]]], ['_locale', 'number'], ['GET' => 0], null, false, true, null]],
        10490 => [[['_route' => 'sylius_shop_account_address_book_index', '_controller' => 'sylius.controller.address:indexAction', '_sylius' => ['section' => 'shop_account', 'template' => '@SyliusShop/Account/AddressBook/index.html.twig', 'paginate' => false, 'repository' => ['method' => 'findByCustomer', 'arguments' => ['expr:service(\'sylius.context.customer\').getCustomer()']]]], ['_locale'], ['GET' => 0], null, true, false, null]],
        10602 => [[['_route' => 'sylius_shop_account_address_book_create', '_controller' => 'sylius.controller.address:createAction', '_sylius' => ['section' => 'shop_account', 'template' => '@SyliusShop/Account/AddressBook/create.html.twig', 'factory' => ['method' => 'createForCustomer', 'arguments' => ['expr:service(\'sylius.context.customer\').getCustomer()']], 'redirect' => ['route' => 'sylius_shop_account_address_book_index', 'parameters' => []], 'flash' => 'sylius.customer.add_address']], ['_locale'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        10724 => [[['_route' => 'sylius_shop_account_address_book_update', '_controller' => 'sylius.controller.address:updateAction', '_sylius' => ['section' => 'shop_account', 'template' => '@SyliusShop/Account/AddressBook/update.html.twig', 'repository' => ['method' => 'findOneByCustomer', 'arguments' => ['$id', 'expr:service(\'sylius.context.customer\').getCustomer()']], 'redirect' => ['route' => 'sylius_shop_account_address_book_index', 'parameters' => []]]], ['_locale', 'id'], ['GET' => 0, 'PUT' => 1], null, false, false, null]],
        10841 => [[['_route' => 'sylius_shop_account_address_book_delete', '_controller' => 'sylius.controller.address:deleteAction', '_sylius' => ['section' => 'shop_account', 'repository' => ['method' => 'findOneByCustomer', 'arguments' => ['$id', 'expr:service(\'sylius.context.customer\').getCustomer()']], 'redirect' => 'sylius_shop_account_address_book_index']], ['_locale', 'id'], ['DELETE' => 0], null, false, true, null]],
        10975 => [[['_route' => 'sylius_shop_account_address_book_set_as_default', '_controller' => 'sylius.controller.customer:updateAction', '_sylius' => ['section' => 'shop_account', 'template' => '@SyliusShop/Account/AddressBook/_defaultAddressForm.html.twig', 'form' => ['type' => 'Sylius\\Bundle\\CoreBundle\\Form\\Type\\Customer\\CustomerDefaultAddressType', 'options' => ['customer' => 'expr:service(\'sylius.context.customer\').getCustomer()']], 'repository' => ['method' => 'find', 'arguments' => ['expr:service(\'sylius.context.customer\').getCustomer()']], 'redirect' => ['route' => 'sylius_shop_account_address_book_index', 'parameters' => []], 'flash' => 'sylius.customer.set_address_as_default']], ['_locale', 'id'], ['GET' => 0, 'PATCH' => 1], null, false, false, null]],
        11069 => [[['_route' => 'sylius_shop_account_root', '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController:redirectAction', 'route' => 'sylius_shop_account_dashboard', 'permanent' => true], ['_locale'], ['GET' => 0], null, true, false, null]],
        11173 => [[['_route' => 'sylius_shop_account_dashboard', '_controller' => 'sylius.controller.customer:showAction', '_sylius' => ['template' => '@SyliusShop/Account/dashboard.html.twig', 'repository' => ['method' => 'find', 'arguments' => ['expr:service(\'sylius.context.customer\').getCustomer()']]]], ['_locale'], ['GET' => 0], null, false, false, null]],
        11280 => [[['_route' => 'sylius_shop_account_profile_update', '_controller' => 'sylius.controller.customer:updateAction', '_sylius' => ['template' => '@SyliusShop/Account/profileUpdate.html.twig', 'form' => 'Sylius\\Bundle\\CustomerBundle\\Form\\Type\\CustomerProfileType', 'repository' => ['method' => 'find', 'arguments' => ['expr:service(\'sylius.context.customer\').getCustomer()']], 'redirect' => ['route' => 'sylius_shop_account_profile_update', 'parameters' => []]]], ['_locale'], ['GET' => 0, 'PUT' => 1], null, false, false, null]],
        11391 => [[['_route' => 'sylius_shop_account_change_password', '_controller' => 'sylius.controller.shop_user:changePasswordAction', '_sylius' => ['template' => '@SyliusShop/Account/changePassword.html.twig', 'redirect' => 'sylius_shop_account_dashboard']], ['_locale'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        11503 => [[['_route' => 'sylius_shop_switch_currency', '_controller' => 'sylius.controller.shop.currency_switch:switchAction'], ['_locale', 'code'], ['GET' => 0], null, false, true, null]],
        11613 => [[['_route' => 'sylius_shop_switch_locale', '_controller' => 'sylius.controller.shop.locale_switch:switchAction'], ['_locale', 'code'], ['GET' => 0], null, false, true, null]],
        11653 => [[['_route' => 'payum_authorize_do', '_controller' => 'Payum\\Bundle\\PayumBundle\\Controller\\AuthorizeController::doAction'], ['payum_token'], null, null, false, true, null]],
        11679 => [[['_route' => 'payum_capture_do', '_controller' => 'Payum\\Bundle\\PayumBundle\\Controller\\CaptureController::doAction'], ['payum_token'], null, null, false, true, null]],
        11714 => [[['_route' => 'payum_notify_do_unsafe', '_controller' => 'Payum\\Bundle\\PayumBundle\\Controller\\NotifyController::doUnsafeAction'], ['gateway'], null, null, false, true, null]],
        11732 => [[['_route' => 'payum_notify_do', '_controller' => 'Payum\\Bundle\\PayumBundle\\Controller\\NotifyController::doAction'], ['payum_token'], null, null, false, true, null]],
        11761 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        11809 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        11825 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        11847 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        11862 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        11874 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

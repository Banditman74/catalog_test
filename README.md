<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Что сделано
1. Создал 2 модели Product и ProductProperty
2. Связь Product с ProductProperty - HasMany
3. Создал Factory на 500 товаров
4. Подключил API (В laravel 11 подключается отдельно)
5. Сделал resource controller (Можно было сделать invoke - Single Action Controllers)
6. Создал 2-ва ресурса для более тонкой настройки ответа по API (ProductResource и ProductPropertyResource)
7. Обработал некоторые ошибки в ProductFilterRequest
8. Вынес фильтрацию в App\Services\ProductFilterService - отвечает за фильтрацию продуктов на основе свойств

### При работе использовал установку через Sail + Mysql

При запуске через Sail
```bash
sail artisan migrate:fresh --seed
```
или с помощью php artisan в случае с отдельным Mysql сервером
```bash
php artisan migrate:fresh --seed
```

Св-ва товаров для фильтра:
- Цвет плафона - бронза, золото, серебро, белый, черный,
- Материал плафона - органза, стекло, хрусталь, пластик, ткань,
- Цвет арматуры - бронза, золото, серебро, белый, черный,
- Материал арматуры - металл, дерево, пластик, стекло, алюминий

## Основные страницы и пагинация
```
/api/products
```
```
/api/products?page=2
```
```
/api/products?page=3
```
и т.д.

## Несколько примеров фильтра
```
/api/products?properties[Цвет плафона][]=золото&properties[Материал плафона][]=серебро
```

```
/api/products?properties[Цвет плафона][]=бронза&properties[Цвет арматуры][]=металл
```

```
/api/products?properties[Цвет арматуры][]=черный&properties[Цвет плафона][]=белый
```

```
/api/products?properties[Материал плафона][]=серебро&properties[Материал плафона][]=органза&properties[Цвет плафона][]=белый
```

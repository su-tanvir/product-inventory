USE product_inventory;

INSERT INTO categories (name, description, created_at, updated_at) VALUES
    ('Sports', 'Category for sports-related products and equipment', NOW(), NOW()),
    ('Electronics', 'Category for electronic devices and gadgets', NOW(), NOW()),
    ('Books', 'Category for various genres of books', NOW(), NOW());


INSERT INTO products (name, description, price, stock, category_id, created_at, updated_at) VALUES
    ('Soccer Ball', 'Official size and weight soccer ball for professional and recreational play', 29.99, 50, 1, NOW(), NOW()),
    ('Basketball', 'High-quality basketball for indoor and outdoor games', 24.99, 40, 1, NOW(), NOW()),
    ('Running Shoes', 'Performance running shoes with advanced cushioning technology', 89.99, 60, 1, NOW(), NOW()),
    ('Tennis Racket', 'Professional-grade tennis racket for players of all skill levels', 129.99, 25, 1, NOW(), NOW()),
    ('Smartphone', 'High-end smartphone with advanced features', 899.99, 50, 2, NOW(), NOW()),
    ('Laptop', 'Powerful laptop for productivity and gaming', 1299.99, 30, 2, NOW(), NOW()),
    ('Coding book', 'Clean Code: A Handbook of Agile Software Craftsmanship', 89.99, 20, 3, NOW(), NOW());

CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin bool,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    color VARCHAR(255),
    screen VARCHAR(255),
    operating_system VARCHAR(255),
    rear_camera VARCHAR(255),
    front_camera VARCHAR(255),
    cpu VARCHAR(255),
    ram VARCHAR(255),
    internal_storage VARCHAR(255),
    memory_card VARCHAR(255),
    battery_capacity VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    brand_id INT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (brand_id) REFERENCES Brands(id)
);

CREATE TABLE Orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    status VARCHAR(255),
    address VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE OrderDetails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES Orders(id),
    FOREIGN KEY (product_id) REFERENCES Products(id)
);

CREATE TABLE Carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE CartItems (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT,
    product_id INT,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (cart_id) REFERENCES Carts(id),
    FOREIGN KEY (product_id) REFERENCES Products(id)
);

-- Insert dữ liệu vào bảng Brands
-- Chèn dữ liệu cho bảng Brands
INSERT INTO Brands (name, image) VALUES
('Apple', 'apple_logo.png'),
('Samsung', 'samsung_logo.png'),
('Xiaomi', 'xiaomi_logo.png'),
('Oppo', 'oppo_logo.png'),
('Vivo', 'vivo_logo.png'),
('Huawei', 'huawei_logo.png'),
('OnePlus', 'oneplus_logo.png'),
('Google', 'google_logo.png'),
('Sony', 'sony_logo.png'),
('Realme', 'realme_logo.png');

-- Chèn dữ liệu cho bảng Products
INSERT INTO Products (name, color, screen, operating_system, rear_camera, front_camera, cpu, ram, internal_storage, memory_card, battery_capacity, price, brand_id, image) VALUES
-- Apple
('iPhone 15 Pro Max', 'Natural Titanium', '6.7" Super Retina XDR OLED', 'iOS 17', '48MP + 12MP + 12MP', '12MP', 'A17 Pro', '8GB', '256GB', 'No', '4422mAh', 1199.99, 1, 'iphone15_pro_max.png'),
('iPhone 15 Pro', 'Blue Titanium', '6.1" Super Retina XDR OLED', 'iOS 17', '48MP + 12MP + 12MP', '12MP', 'A17 Pro', '8GB', '128GB', 'No', '3274mAh', 999.99, 1, 'iphone15_pro.png'),
('iPhone 15', 'Pink', '6.1" Super Retina XDR OLED', 'iOS 17', '48MP + 12MP', '12MP', 'A16 Bionic', '6GB', '128GB', 'No', '3349mAh', 799.99, 1, 'iphone15.png'),
('iPhone 15 Plus', 'Yellow', '6.7" Super Retina XDR OLED', 'iOS 17', '48MP + 12MP', '12MP', 'A16 Bionic', '6GB', '128GB', 'No', '4383mAh', 899.99, 1, 'iphone15_plus.png'),
('iPhone 14 Pro', 'Deep Purple', '6.1" Super Retina XDR OLED', 'iOS 16', '48MP + 12MP + 12MP', '12MP', 'A16 Bionic', '6GB', '128GB', 'No', '3200mAh', 899.99, 1, 'iphone14_pro.png'),

-- Samsung
('Galaxy S24 Ultra', 'Titanium Gray', '6.8" Dynamic AMOLED 2X', 'Android 14', '200MP + 50MP + 12MP + 10MP', '12MP', 'Snapdragon 8 Gen 3', '12GB', '256GB', 'Yes', '5000mAh', 1299.99, 2, 'galaxy_s24_ultra.png'),
('Galaxy S24+', 'Cobalt Violet', '6.7" Dynamic AMOLED 2X', 'Android 14', '50MP + 12MP + 10MP', '12MP', 'Exynos 2400', '12GB', '256GB', 'Yes', '4900mAh', 999.99, 2, 'galaxy_s24_plus.png'),
('Galaxy S24', 'Onyx Black', '6.2" Dynamic AMOLED 2X', 'Android 14', '50MP + 12MP + 10MP', '12MP', 'Exynos 2400', '8GB', '128GB', 'Yes', '4000mAh', 799.99, 2, 'galaxy_s24.png'),
('Galaxy Z Fold5', 'Cream', '7.6" Dynamic AMOLED 2X', 'Android 13', '50MP + 12MP + 10MP', '4MP + 10MP', 'Snapdragon 8 Gen 2', '12GB', '256GB', 'Yes', '4400mAh', 1799.99, 2, 'galaxy_z_fold5.png'),
('Galaxy Z Flip5', 'Mint', '6.7" Dynamic AMOLED 2X', 'Android 13', '12MP + 12MP', '10MP', 'Snapdragon 8 Gen 2', '8GB', '256GB', 'Yes', '3700mAh', 999.99, 2, 'galaxy_z_flip5.png'),

-- Xiaomi
('Xiaomi 14 Ultra', 'Black', '6.73" LTPO AMOLED', 'Android 14', '50MP + 50MP + 50MP + 50MP', '32MP', 'Snapdragon 8 Gen 3', '12GB', '256GB', 'No', '5000mAh', 1199.99, 3, 'xiaomi_14_ultra.png'),
('Xiaomi 14 Pro', 'White', '6.73" LTPO AMOLED', 'Android 14', '50MP + 50MP + 50MP', '32MP', 'Snapdragon 8 Gen 3', '12GB', '256GB', 'No', '4880mAh', 999.99, 3, 'xiaomi_14_pro.png'),
('Xiaomi 14', 'Green', '6.36" AMOLED', 'Android 14', '50MP + 50MP + 50MP', '32MP', 'Snapdragon 8 Gen 3', '8GB', '256GB', 'No', '4610mAh', 799.99, 3, 'xiaomi_14.png'),
('Redmi Note 13 Pro+ 5G', 'Aurora Purple', '6.67" AMOLED', 'Android 13', '200MP + 8MP + 2MP', '16MP', 'Dimensity 7200 Ultra', '12GB', '256GB', 'Yes', '5000mAh', 399.99, 3, 'redmi_note_13_pro_plus.png'),
('Redmi Note 13 Pro 5G', 'Midnight Black', '6.67" AMOLED', 'Android 13', '200MP + 8MP + 2MP', '16MP', 'Snapdragon 7s Gen 2', '8GB', '128GB', 'Yes', '5100mAh', 299.99, 3, 'redmi_note_13_pro.png'),

-- Oppo
('Find X7 Ultra', 'Ocean Blue', '6.82" LTPO AMOLED', 'Android 14', '50MP + 50MP + 50MP + 50MP', '32MP', 'Dimensity 9300', '16GB', '512GB', 'No', '5000mAh', 1099.99, 4, 'find_x7_ultra.png'),
('Find X7 Pro', 'Coral Purple', '6.78" LTPO AMOLED', 'Android 14', '50MP + 50MP + 50MP', '32MP', 'Dimensity 9300', '12GB', '256GB', 'No', '5000mAh', 899.99, 4, 'find_x7_pro.png'),
('Reno11 Pro', 'Pearl White', '6.7" AMOLED', 'Android 14', '50MP + 32MP + 8MP', '32MP', 'Dimensity 8200', '12GB', '256GB', 'No', '4700mAh', 599.99, 4, 'reno11_pro.png'),
('Reno11', 'Rock Grey', '6.7" AMOLED', 'Android 14', '64MP + 32MP + 8MP', '32MP', 'Dimensity 7050', '8GB', '256GB', 'No', '4800mAh', 499.99, 4, 'reno11.png'),
('A2 Pro', 'Aqua Green', '6.7" AMOLED', 'Android 13', '64MP + 8MP + 2MP', '32MP', 'Dimensity 7050', '8GB', '256GB', 'Yes', '5000mAh', 299.99, 4, 'a2_pro.png'),

-- Vivo
('X100 Pro', 'Asteroid Black', '6.78" LTPO AMOLED', 'Android 14', '50MP + 50MP + 50MP', '32MP', 'Dimensity 9300', '16GB', '512GB', 'No', '5400mAh', 999.99, 5, 'x100_pro.png'),
('X100', 'Startrail Blue', '6.78" LTPO AMOLED', 'Android 14', '50MP + 50MP + 12MP', '32MP', 'Dimensity 9300', '12GB', '256GB', 'No', '5000mAh', 799.99, 5, 'x100.png'),
('V30 Pro', 'Peacock Green', '6.78" AMOLED', 'Android 14', '50MP + 50MP + 12MP', '50MP', 'Snapdragon 8 Gen 2', '12GB', '512GB', 'No', '5000mAh', 699.99, 5, 'v30_pro.png'),
('V30', 'Lake Blue', '6.78" AMOLED', 'Android 14', '50MP + 2MP + 2MP', '50MP', 'Snapdragon 7 Gen 3', '12GB', '256GB', 'Yes', '5000mAh', 499.99, 5, 'v30.png'),
('Y100', 'Metal Black', '6.38" AMOLED', 'Android 13', '64MP + 2MP + 2MP', '16MP', 'Snapdragon 695', '8GB', '128GB', 'Yes', '4500mAh', 249.99, 5, 'y100.png'),

-- Huawei
('Mate 60 Pro+', 'Cream', '6.82" LTPO OLED', 'HarmonyOS 4.0', '48MP + 48MP + 40MP', '13MP', 'Kirin 9000S', '16GB', '1TB', 'Yes', '5000mAh', 1299.99, 6, 'mate_60_pro_plus.png'),
('Mate 60 Pro', 'Green', '6.82" LTPO OLED', 'HarmonyOS 4.0', '50MP + 48MP + 12MP', '13MP', 'Kirin 9000S', '12GB', '512GB', 'Yes', '5000mAh', 1099.99, 6, 'mate_60_pro.png'),
('Mate 60', 'Black', '6.69" OLED', 'HarmonyOS 4.0', '50MP + 12MP + 12MP', '13MP', 'Kirin 9000S', '8GB', '256GB', 'Yes', '4750mAh', 899.99, 6, 'mate_60.png'),
('P60 Pro', 'Rococo Pearl', '6.67" LTPO OLED', 'HarmonyOS 3.1', '48MP + 48MP + 13MP', '13MP', 'Snapdragon 8+ Gen 1 4G', '8GB', '256GB', 'Yes', '4815mAh', 999.99, 6, 'p60_pro.png'),
('Nova 11 Pro', 'Malachite Green', '6.78" OLED', 'HarmonyOS 3.0', '50MP + 8MP', '60MP + 8MP', 'Snapdragon 778G 4G', '8GB', '256GB', 'Yes', '4500mAh', 599.99, 6, 'nova_11_pro.png'),

-- OnePlus
('12 Pro', 'Emerald Flow', '6.82" LTPO AMOLED', 'Android 14', '50MP + 64MP + 48MP', '32MP', 'Snapdragon 8 Gen 3', '16GB', '512GB', 'No', '5400mAh', 1099.99, 7, 'oneplus_12_pro.png'),
('12', 'Flowy Emerald', '6.82" LTPO AMOLED', 'Android 14', '50MP + 48MP + 32MP', '32MP', 'Snapdragon 8 Gen 3', '12GB', '256GB', 'No', '5400mAh', 899.99, 7, 'oneplus_12.png'),
('12R', 'Cool Blue', '6.78" AMOLED', 'Android 14', '50MP + 8MP + 2MP', '16MP', 'Snapdragon 8 Gen 2', '8GB', '128GB', 'No', '5500mAh', 599.99, 7, 'oneplus_12r.png'),
('Nord 3', 'Tempest Gray', '6.74" AMOLED', 'Android 13', '50MP + 8MP + 2MP', '16MP', 'Dimensity 9000', '8GB', '128GB', 'No', '5000mAh', 449.99, 7, 'oneplus_nord_3.png'),
('Nord CE 3 Lite', 'Pastel Lime', '6.72" IPS LCD', 'Android 13', '108MP + 2MP + 2MP', '16MP', 'Snapdragon 695', '8GB', '128GB', 'Yes', '5000mAh', 299.99, 7, 'oneplus_nord_ce_3_lite.png'),

-- Google
('Pixel 8 Pro', 'Bay Blue', '6.7" LTPO OLED', 'Android 14', '50MP + 48MP + 48MP', '10.5MP', 'Google Tensor G3', '12GB', '128GB', 'No', '5050mAh', 999.99, 8, 'pixel_8_pro.png'),
('Pixel 8', 'Hazel', '6.2" OLED', 'Android 14', '50MP + 12MP', '10.5MP', 'Google Tensor G3', '8GB', '128GB', 'No', '4575mAh', 699.99, 8, 'pixel_8.png');


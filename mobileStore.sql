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
('iPhone 15 Pro Max', 'Natural Titanium', '6.7" Super Retina XDR OLED', 'iOS 17', '48MP + 12MP + 12MP', '12MP', 'A17 Pro', '8GB', '256GB', 'No', '4422mAh', 29390000, 1, 'iphone15_pro_max.jpg'),
('iPhone 15 Pro', 'Blue Titanium', '6.1" Super Retina XDR OLED', 'iOS 17', '48MP + 12MP + 12MP', '12MP', 'A17 Pro', '8GB', '128GB', 'No', '3274mAh', 24990000, 1, 'iphone15_pro.jpg'),
('iPhone 15', 'Pink', '6.1" Super Retina XDR OLED', 'iOS 17', '48MP + 12MP', '12MP', 'A16 Bionic', '6GB', '128GB', 'No', '3349mAh', 19990000, 1,'iphone15.jpg'),
('iPhone 15 Plus', 'Yellow', '6.7" Super Retina XDR OLED', 'iOS 17', '48MP + 12MP', '12MP', 'A16 Bionic', '6GB', '128GB', 'No', '4383mAh', 22990000, 1, 'iphone15_plus.jpg'),
('iPhone 14 Pro', 'Deep Purple', '6.1" Super Retina XDR OLED', 'iOS 16', '48MP + 12MP + 12MP', '12MP', 'A16 Bionic', '6GB', '128GB', 'No', '3200mAh', 19390000, 1, 'iphone14_pro.jpg'),

-- Samsung
('Galaxy S24 Ultra', 'Titanium Gray', '6.8" Dynamic AMOLED 2X', 'Android 14', '200MP + 50MP + 12MP + 10MP', '12MP', 'Snapdragon 8 Gen 3', '12GB', '256GB', 'Yes', '5000mAh', 27990000, 2, 'galaxy_s24_ultra.jpg'),
('Galaxy S24+', 'Cobalt Violet', '6.7" Dynamic AMOLED 2X', 'Android 14', '50MP + 12MP + 10MP', '12MP', 'Exynos 2400', '12GB', '256GB', 'Yes', '4900mAh', 22990000, 2, 'galaxy_s24_plus.jpg'),
('Galaxy S24', 'Onyx Black', '6.2" Dynamic AMOLED 2X', 'Android 14', '50MP + 12MP + 10MP', '12MP', 'Exynos 2400', '8GB', '128GB', 'Yes', '4000mAh', 22490000, 2, 'galaxy_s24.jpg'),
('Galaxy Z Fold5', 'Cream', '7.6" Dynamic AMOLED 2X', 'Android 13', '50MP + 12MP + 10MP', '4MP + 10MP', 'Snapdragon 8 Gen 2', '12GB', '256GB', 'Yes', '4400mAh', 22790000, 2, 'galaxy_z_fold5.jpg'),
('Galaxy Z Flip5', 'Mint', '6.7" Dynamic AMOLED 2X', 'Android 13', '12MP + 12MP', '10MP', 'Snapdragon 8 Gen 2', '8GB', '256GB', 'Yes', '3700mAh', 17990000, 2, 'galaxy_z_flip5.jpg'),

-- Xiaomi
('Xiaomi 14 Ultra', 'Black', '6.73" LTPO AMOLED', 'Android 14', '50MP + 50MP + 50MP + 50MP', '32MP', 'Snapdragon 8 Gen 3', '12GB', '256GB', 'No', '5000mAh', 28990000, 3, 'xiaomi_14_ultra.jpg'),
('Xiaomi 14 Pro', 'White', '6.73" LTPO AMOLED', 'Android 14', '50MP + 50MP + 50MP', '32MP', 'Snapdragon 8 Gen 3', '12GB', '256GB', 'No', '4880mAh', 24000000, 3, 'xiaomi_14_pro.jpg'),
('Xiaomi 13 Ultra', 'Black', '6.73" AMOLED', 'Android 13', '50MP + 50MP + 50MP + 50MP', '32MP', 'Snapdragon 8 Gen 2', '12GB', '256GB', 'No', '5000mAh', 23500000, 3, 'xiaomi_13_ultra.jpg'),
('Redmi Note 13 Pro+ 5G', 'Aurora Purple', '6.67" AMOLED', 'Android 13', '200MP + 8MP + 2MP', '16MP', 'Dimensity 7200 Ultra', '12GB', '256GB', 'Yes', '5000mAh', 6250000, 3, 'redmi_note_13_pro_plus.jpg'),
('Redmi Note 13 Pro 5G', 'Midnight Black', '6.67" AMOLED', 'Android 13', '200MP + 8MP + 2MP', '16MP', 'Snapdragon 7s Gen 2', '8GB', '128GB', 'Yes', '5100mAh', 4550000, 3, 'redmi_note_13_pro.jpg'),

-- Oppo
('Find X7 Ultra', 'Ocean Blue', '6.82" LTPO AMOLED', 'Android 14', '50MP + 50MP + 50MP + 50MP', '32MP', 'Dimensity 9300', '16GB', '512GB', 'No', '5000mAh', 20990000 4, 'find_x7_ultra.jpg'),
('Find X7 Pro', 'Coral Purple', '6.78" LTPO AMOLED', 'Android 14', '50MP + 50MP + 50MP', '32MP', 'Dimensity 9300', '12GB', '256GB', 'No', '5000mAh', 11350000, 4, 'find_x7_pro.jpg'),
('Reno11 Pro', 'Pearl White', '6.7" AMOLED', 'Android 14', '50MP + 32MP + 8MP', '32MP', 'Dimensity 8200', '12GB', '256GB', 'No', '4700mAh', 15990000, 4, 'reno11_pro.jpg'),
('Reno11', 'Rock Grey', '6.7" AMOLED', 'Android 14', '64MP + 32MP + 8MP', '32MP', 'Dimensity 7050', '8GB', '256GB', 'No', '4800mAh', 10490000, 4, 'reno11.jpg'),
('A2 Pro', 'Aqua Green', '6.7" AMOLED', 'Android 13', '64MP + 8MP + 2MP', '32MP', 'Dimensity 7050', '8GB', '256GB', 'Yes', '5000mAh', 5990000, 4, 'a2_pro.jpg'),

-- Vivo
('X100 Pro', 'Asteroid Black', '6.78" LTPO AMOLED', 'Android 14', '50MP + 50MP + 50MP', '32MP', 'Dimensity 9300', '16GB', '512GB', 'No', '5400mAh', 17150000, 5, 'x100_pro.jpg'),
('V30 Pro', 'Peacock Green', '6.78" AMOLED', 'Android 14', '50MP + 50MP + 12MP', '50MP', 'Snapdragon 8 Gen 2', '12GB', '512GB', 'No', '5000mAh', 15000000, 5, 'v30_pro.jpg'),
('V30', 'Lake Blue', '6.78" AMOLED', 'Android 14', '50MP + 2MP + 2MP', '50MP', 'Snapdragon 7 Gen 3', '12GB', '256GB', 'Yes', '5000mAh', 13990000, 5, 'v30.jpg'),
('Y100', 'Metal Black', '6.38" AMOLED', 'Android 13', '64MP + 2MP + 2MP', '16MP', 'Snapdragon 695', '8GB', '128GB', 'Yes', '4500mAh', 7050000, 5, 'y100.jpg');



-- Spham moi
INSERT INTO Products (name, color, screen, operating_system, rear_camera, front_camera, cpu, ram, internal_storage, memory_card, battery_capacity, price, brand_id, image) VALUES
('iPhone 13 Pro Max', 'Graphite', '6.7" Super Retina XDR OLED', 'iOS 15', '12MP + 12MP + 12MP', '12MP', 'A15 Bionic', '6GB', '128GB', 'No', '4352mAh', 31990000, 1, 'iphone_13_pro_max.jpg'),
('iPhone 13', 'Starlight', '6.1" Super Retina XDR OLED', 'iOS 15', '12MP + 12MP', '12MP', 'A15 Bionic', '4GB', '128GB', 'No', '3240mAh', 23990000, 1, 'iphone_13.jpg'),
('iPhone 12', 'Purple', '6.1" Super Retina XDR OLED', 'iOS 14', '12MP + 12MP', '12MP', 'A14 Bionic', '4GB', '64GB', 'No', '2815mAh', 19990000, 1, 'iphone_12.jpg'),
('iPhone 11', 'Red', '6.1" Liquid Retina IPS LCD', 'iOS 13', '12MP + 12MP', '12MP', 'A13 Bionic', '4GB', '64GB', 'No', '3110mAh', 14990000, 1, 'iphone_11.jpg'),
('iPhone XR', 'Coral', '6.1" Liquid Retina IPS LCD', 'iOS 12', '12MP', '7MP', 'A12 Bionic', '3GB', '64GB', 'No', '2942mAh', 12990000, 1, 'iphone_xr.jpg'),
('iPhone XS Max', 'Gold', '6.5" Super Retina OLED', 'iOS 12', '12MP + 12MP', '7MP', 'A12 Bionic', '4GB', '64GB', 'No', '3174mAh', 19990000, 1, 'iphone_xs_max.jpg'),
('iPhone XS', 'Space Gray', '5.8" Super Retina OLED', 'iOS 12', '12MP + 12MP', '7MP', 'A12 Bionic', '4GB', '64GB', 'No', '2658mAh', 17990000, 1, 'iphone_xs.jpg');

INSERT INTO Products (name, color, screen, operating_system, rear_camera, front_camera, cpu, ram, internal_storage, memory_card, battery_capacity, price, brand_id, image) VALUES
('Galaxy S21 Ultra', 'Phantom Silver', '6.8" Dynamic AMOLED 2X', 'Android 11', '108MP + 10MP + 10MP + 12MP', '40MP', 'Exynos 2100', '12GB', '256GB', 'Yes', '5000mAh', 29990000, 2, 'galaxy_s21_ultra.jpg'),
('Galaxy S21+', 'Phantom Violet', '6.7" Dynamic AMOLED 2X', 'Android 11', '64MP + 12MP + 12MP', '10MP', 'Exynos 2100', '8GB', '128GB', 'Yes', '4800mAh', 24990000, 2, 'galaxy_s21_plus.jpg'),
('Galaxy Note 20', 'Mystic Green', '6.7" Super AMOLED Plus', 'Android 10', '64MP + 12MP + 12MP', '10MP', 'Exynos 990', '8GB', '256GB', 'Yes', '4300mAh', 22990000, 2, 'galaxy_note_20.jpg'),
('Galaxy Z Flip3', 'Lavender', '6.7" Foldable Dynamic AMOLED 2X', 'Android 11', '12MP + 12MP', '10MP', 'Snapdragon 888', '8GB', '128GB', 'No', '3300mAh', 21990000, 2, 'galaxy_z_flip3.jpg'),
('Galaxy A72', 'Awesome Blue', '6.7" Super AMOLED', 'Android 11', '64MP + 8MP + 12MP + 5MP', '32MP', 'Snapdragon 720G', '8GB', '128GB', 'Yes', '5000mAh', 10990000, 2, 'galaxy_a72.jpg'),
('Galaxy A52', 'Awesome White', '6.5" Super AMOLED', 'Android 11', '64MP + 12MP + 5MP + 5MP', '32MP', 'Snapdragon 720G', '8GB', '128GB', 'Yes', '4500mAh', 8990000, 2, 'galaxy_a52.jpg'),
('Galaxy M32', 'Black', '6.4" Super AMOLED', 'Android 11', '64MP + 8MP + 2MP + 2MP', '20MP', 'Helio G80', '6GB', '128GB', 'Yes', '6000mAh', 6490000, 2, 'galaxy_m32.jpg');

INSERT INTO Products (name, color, screen, operating_system, rear_camera, front_camera, cpu, ram, internal_storage, memory_card, battery_capacity, price, brand_id, image) VALUES
('Xiaomi 11T Pro', 'Meteorite Gray', '6.67" AMOLED', 'Android 11', '108MP + 8MP + 5MP', '16MP', 'Snapdragon 888', '8GB', '128GB', 'No', '5000mAh', 13990000, 3, 'xiaomi_11t_pro.jpg'),
('Mi 11 Ultra', 'Ceramic White', '6.81" AMOLED', 'Android 11', '50MP + 48MP + 48MP', '20MP', 'Snapdragon 888', '12GB', '256GB', 'No', '5000mAh', 19990000, 3, 'mi_11_ultra.jpg'),
('Redmi Note 10 Pro', 'Gradient Bronze', '6.67" Super AMOLED', 'Android 11', '108MP + 8MP + 5MP + 2MP', '16MP', 'Snapdragon 732G', '8GB', '128GB', 'Yes', '5020mAh', 8490000, 3, 'redmi_note_10_pro.jpg'),
('Redmi 9T', 'Twilight Blue', '6.53" IPS LCD', 'Android 10', '48MP + 8MP + 2MP + 2MP', '8MP', 'Snapdragon 662', '4GB', '64GB', 'Yes', '6000mAh', 3990000, 3, 'redmi_9t.jpg'),
('Poco X3 Pro', 'Phantom Black', '6.67" IPS LCD', 'Android 11', '48MP + 8MP + 2MP + 2MP', '20MP', 'Snapdragon 860', '6GB', '128GB', 'Yes', '5160mAh', 6490000, 3, 'poco_x3_pro.jpg'),
('Poco M3 Pro 5G', 'Power Black', '6.5" IPS LCD', 'Android 11', '48MP + 2MP + 2MP', '8MP', 'Dimensity 700', '4GB', '64GB', 'Yes', '5000mAh', 4490000, 3, 'poco_m3_pro_5g.jpg'),
('Mi Note 10 Lite', 'Glacier White', '6.47" AMOLED', 'Android 10', '64MP + 8MP + 2MP + 5MP', '32MP', 'Snapdragon 730G', '6GB', '64GB', 'Yes', '5260mAh', 6990000, 3, 'mi_note_10_lite.jpg');

INSERT INTO Products (name, color, screen, operating_system, rear_camera, front_camera, cpu, ram, internal_storage, memory_card, battery_capacity, price, brand_id, image) VALUES
('Find X3 Pro', 'Gloss Black', '6.7" LTPO AMOLED', 'Android 11', '50MP + 13MP + 50MP + 3MP', '32MP', 'Snapdragon 888', '12GB', '256GB', 'No', '4500mAh', 24990000, 4, 'find_x3_pro.jpg'),
('Reno6', 'Aurora', '6.4" AMOLED', 'Android 11', '64MP + 8MP + 2MP + 2MP', '32MP', 'Dimensity 900', '8GB', '128GB', 'No', '4300mAh', 8990000, 4, 'reno6.jpg'),
('A94', 'Fluid Black', '6.43" AMOLED', 'Android 11', '48MP + 8MP + 2MP + 2MP', '32MP', 'Helio P95', '8GB', '128GB', 'Yes', '4310mAh', 6990000, 4, 'a94.jpg'),
('F19 Pro', 'Crystal Silver', '6.43" Super AMOLED', 'Android 11', '48MP + 8MP + 2MP + 2MP', '16MP', 'Helio P95', '8GB', '128GB', 'Yes', '4310mAh', 7490000, 4, 'f19_pro.jpg'),
('A53', 'Electric Black', '6.5" IPS LCD', 'Android 10', '13MP + 2MP + 2MP', '16MP', 'Snapdragon 460', '4GB', '64GB', 'Yes', '5000mAh', 3490000, 4, 'a53.jpg'),
('Reno5', 'Fantasy Silver', '6.43" AMOLED', 'Android 11', '64MP + 8MP + 2MP + 2MP', '44MP', 'Snapdragon 720G', '8GB', '128GB', 'Yes', '4310mAh', 8490000, 4, 'reno5.jpg'),
('A16', 'Pearl Blue', '6.52" IPS LCD', 'Android 11', '13MP + 2MP + 2MP', '8MP', 'Helio G35', '3GB', '32GB', 'Yes', '5000mAh', 2990000, 4, 'a16.jpg');

INSERT INTO Products (name, color, screen, operating_system, rear_camera, front_camera, cpu, ram, internal_storage, memory_card, battery_capacity, price, brand_id, image) VALUES
('Vivo X60 Pro', 'Midnight Black', '6.56" AMOLED', 'Android 11', '48MP + 13MP + 13MP', '32MP', 'Snapdragon 870', '12GB', '256GB', 'No', '4200mAh', 19990000, 5, 'vivo_x60_pro.jpg'),
('Vivo V21', 'Sunset Dazzle', '6.44" AMOLED', 'Android 11', '64MP + 8MP + 2MP', '44MP', 'Dimensity 800U', '8GB', '128GB', 'Yes', '4000mAh', 9490000, 5, 'vivo_v21.jpg'),
('Vivo Y51A', 'Titanium Sapphire', '6.58" IPS LCD', 'Android 11', '48MP + 2MP + 2MP', '16MP', 'Snapdragon 662', '8GB', '128GB', 'Yes', '5000mAh', 5490000, 5, 'vivo_y51a.jpg'),
('Vivo Y20', 'Obsidian Black', '6.51" IPS LCD', 'Android 10', '13MP + 2MP + 2MP', '8MP', 'Snapdragon 460', '4GB', '64GB', 'Yes', '5000mAh', 3490000, 5, 'vivo_y20.jpg'),
('Vivo V20 SE', 'Gravity Black', '6.44" AMOLED', 'Android 10', '48MP + 8MP + 2MP', '32MP', 'Snapdragon 665', '8GB', '128GB', 'Yes', '4100mAh', 5990000, 5, 'vivo_v20_se.jpg'),
('Vivo Y12s', 'Phantom Black', '6.51" IPS LCD', 'Android 10', '13MP + 2MP', '8MP', 'Helio P35', '3GB', '32GB', 'Yes', '5000mAh', 2990000, 5, 'vivo_y12s.jpg'),
('Vivo Y11', 'Mineral Blue', '6.35" IPS LCD', 'Android 9.0', '13MP + 2MP', '8MP', 'Snapdragon 439', '3GB', '32GB', 'Yes', '5000mAh', 2490000, 5, 'vivo_y11.jpg');

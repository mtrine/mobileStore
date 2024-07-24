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
INSERT INTO Brands (name, image) VALUES 
('Apple', 'apple_logo.png'),
('Samsung', 'samsung_logo.png'),
('Xiaomi', 'xiaomi_logo.png'),
('OnePlus', 'oneplus_logo.png'),
('Huawei', 'huawei_logo.png'),
('Sony', 'sony_logo.png'),
('Oppo', 'oppo_logo.png'),
('Google', 'google_logo.png');

-- Insert dữ liệu vào bảng Products
INSERT INTO Products (name, screen, operating_system, rear_camera, front_camera, cpu, ram, internal_storage, memory_card, battery_capacity, price, brand_id, image) VALUES
('iPhone 13', '6.1-inch', 'iOS', '12 MP', '12 MP', 'A15 Bionic', '4 GB', '128 GB', 'Không', '3095 mAh', 999.99, 1, 'iphone13.png'),
('Samsung Galaxy S21', '6.2-inch', 'Android', '12 MP + 64 MP + 12 MP', '10 MP', 'Exynos 2100', '8 GB', '128 GB', 'Có', '4000 mAh', 799.99, 2, 'galaxys21.png'),
('Xiaomi Mi 11', '6.81-inch', 'Android', '108 MP', '20 MP', 'Snapdragon 888', '8 GB', '256 GB', 'Có', '4600 mAh', 749.99, 3, 'mi11.png'),
('iPhone 12', '6.1-inch', 'iOS', '12 MP', '12 MP', 'A14 Bionic', '4 GB', '64 GB', 'Không', '2815 mAh', 799.99, 1, 'iphone12.png'),
('Samsung Galaxy Note 20', '6.7-inch', 'Android', '12 MP + 64 MP + 12 MP', '10 MP', 'Exynos 990', '8 GB', '256 GB', 'Có', '4300 mAh', 949.99, 2, 'galaxynote20.png'),
('Xiaomi Redmi Note 10', '6.43-inch', 'Android', '48 MP', '13 MP', 'Snapdragon 678', '4 GB', '128 GB', 'Có', '5000 mAh', 199.99, 3, 'redminote10.png'),
('OnePlus 9', '6.55-inch', 'Android', '48 MP', '16 MP', 'Snapdragon 888', '8 GB', '128 GB', 'Không', '4500 mAh', 729.99, 4, 'oneplus9.png'),
('Huawei P40', '6.1-inch', 'Android', '50 MP', '32 MP', 'Kirin 990', '8 GB', '128 GB', 'Có', '3800 mAh', 699.99, 5, 'huaweip40.png'),
('Sony Xperia 1 II', '6.5-inch', 'Android', '12 MP', '8 MP', 'Snapdragon 865', '8 GB', '256 GB', 'Có', '4000 mAh', 1199.99, 6, 'xperia1ii.png'),
('Oppo Find X3 Pro', '6.7-inch', 'Android', '50 MP', '32 MP', 'Snapdragon 888', '12 GB', '256 GB', 'Có', '4500 mAh', 1149.99, 7, 'findx3pro.png'),
('Google Pixel 5', '6.0-inch', 'Android', '12.2 MP', '8 MP', 'Snapdragon 765G', '8 GB', '128 GB', 'Không', '4080 mAh', 699.99, 8, 'pixel5.png');

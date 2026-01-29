-- Schéma relationnel de base pour NovaCommerce
CREATE TABLE users (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  status VARCHAR(50) DEFAULT 'active',
  mfa_enabled BOOLEAN DEFAULT FALSE,
  last_login_at TIMESTAMP NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE roles (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  scope VARCHAR(255),
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE permissions (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  module VARCHAR(255) NOT NULL,
  action VARCHAR(255) NOT NULL,
  resource VARCHAR(255),
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE permission_role (
  role_id BIGINT NOT NULL,
  permission_id BIGINT NOT NULL,
  PRIMARY KEY (role_id, permission_id)
);

CREATE TABLE role_user (
  role_id BIGINT NOT NULL,
  user_id BIGINT NOT NULL,
  context_scope VARCHAR(255),
  PRIMARY KEY (role_id, user_id)
);

CREATE TABLE products (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE NOT NULL,
  description TEXT,
  category_id BIGINT,
  status VARCHAR(50) DEFAULT 'draft',
  seo_title VARCHAR(255),
  seo_description TEXT,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE categories (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE NOT NULL,
  parent_id BIGINT,
  description TEXT,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE variants (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  product_id BIGINT NOT NULL,
  sku VARCHAR(255) UNIQUE NOT NULL,
  attributes JSON NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  stock INT DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE orders (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  user_id BIGINT,
  status VARCHAR(50) DEFAULT 'pending',
  total_amount DECIMAL(10,2) NOT NULL,
  currency VARCHAR(10) DEFAULT 'XOF',
  channel VARCHAR(50) DEFAULT 'web',
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE order_items (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  order_id BIGINT NOT NULL,
  product_id BIGINT NOT NULL,
  variant_id BIGINT,
  quantity INT NOT NULL,
  unit_price DECIMAL(10,2) NOT NULL,
  total_price DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE coupons (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  code VARCHAR(255) UNIQUE NOT NULL,
  type VARCHAR(50) NOT NULL,
  value DECIMAL(10,2) NOT NULL,
  min_amount DECIMAL(10,2),
  usage_limit INT,
  starts_at TIMESTAMP NULL,
  ends_at TIMESTAMP NULL,
  is_active BOOLEAN DEFAULT TRUE,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE coupon_usages (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  coupon_id BIGINT NOT NULL,
  user_id BIGINT,
  order_id BIGINT,
  used_at TIMESTAMP NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE addresses (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  user_id BIGINT NOT NULL,
  label VARCHAR(255),
  address_line VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,
  postal_code VARCHAR(50),
  country VARCHAR(100) NOT NULL,
  phone VARCHAR(50),
  is_default BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE payments (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  order_id BIGINT NOT NULL,
  provider VARCHAR(255) NOT NULL,
  status VARCHAR(50) DEFAULT 'pending',
  amount DECIMAL(10,2) NOT NULL,
  transaction_reference VARCHAR(255),
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE shipments (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  order_id BIGINT NOT NULL,
  carrier VARCHAR(255) NOT NULL,
  status VARCHAR(50) DEFAULT 'pending',
  tracking_number VARCHAR(255),
  zone VARCHAR(255),
  shipping_cost DECIMAL(10,2) DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE audit_logs (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  user_id BIGINT,
  module VARCHAR(255) NOT NULL,
  action VARCHAR(255) NOT NULL,
  metadata JSON,
  ip_address VARCHAR(255),
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

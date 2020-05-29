variable "do_token" {
  type = string
}

variable "ssh_fingerprint" {
  type = string
}

variable "pub_key" {
  type    = string
  default = "/Users/an/.ssh/id_rsa.pub"

}

variable "pvt_key" {
  type    = string
  default = "/Users/an/.ssh/id_rsa"
}

provider "digitalocean" {
  token = var.do_token
}

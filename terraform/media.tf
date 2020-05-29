resource "digitalocean_droplet" "media" {
  image = "ubuntu-20-04-x64"
  name = "media"
  region = "fra1"
  size = "s-2vcpu-2gb"
  ssh_keys = [
    var.ssh_fingerprint
  ]

  connection {
    host = self.ipv4_address
    user = "root"
    type = "ssh"
    private_key = file(var.pvt_key)
    timeout = "2m"
  }

  provisioner "remote-exec" {
    inline = [
      "sudo apt update",
      "sudo apt install -y apt-transport-https ca-certificates curl software-properties-common",
      "curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -",
      "sudo add-apt-repository \"deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable\"",
      "sudo apt update",
      "apt-cache policy docker-ce",
      "sudo apt install -y docker-ce",
      "git clone git@github.com:icexch/media.git",
      "cd media",
      "./start.sh"
    ]
  }
}

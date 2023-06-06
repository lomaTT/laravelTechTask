//
//  ViewController.swift
//  Lab1_4
//
//  Created by Ivan Filipchuk on 25/05/2023.
//

import UIKit

class ViewController: UIViewController {
   
    @IBOutlet weak var number1TextField: UITextField!
    @IBOutlet weak var number2TextField: UITextField!
    @IBOutlet weak var resultLabel: UILabel!
    
    @IBAction func calculateButtonTapped(_ sender: UIButton) {
        guard let number1Text = number1TextField.text,
              let number2Text = number2TextField.text,
              let number1 = Double(number1Text),
              let number2 = Double(number2Text) else {
            resultLabel.text = "Błędne dane"
            return
        }
        
        if number2 != 0 {
            let result = number1 / number2
            resultLabel.text = "Wynik: \(result)"
        } else {
            resultLabel.text = "Nie można obliczyć ilorazu"
        }
    }
}

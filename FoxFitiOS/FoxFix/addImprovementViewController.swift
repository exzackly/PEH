//
//  addImprovementViewController.swift
//  FoxFix
//
//  Created by EXZACKLY on 4/10/16.
//  Copyright © 2016 EXZACKLY. All rights reserved.
//

import UIKit

class addImprovementViewController: UIViewController {
    var uid: Int!
    @IBOutlet weak var titleTextField: UITextField!
    @IBOutlet weak var descriptionTextField: UITextField!
    
    @IBAction func submitImprovement(sender: UIBarButtonItem) {
        do {
            var _ = try String(contentsOfURL: NSURL(string: "http://www.exzackly7.com/PEH/backend/addImprovement.php?uid=\(uid)&name=\(titleTextField.text!.stringByReplacingOccurrencesOfString(" ", withString: "%20"))&desc=\(descriptionTextField.text!.stringByReplacingOccurrencesOfString(" ", withString: "%20"))&lcp=idea")!)
            dismissViewControllerAnimated(true, completion: nil)
        } catch let error {
            print(error)
        }
    }

}
